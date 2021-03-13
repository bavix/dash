<?php

namespace App\Units;

use App\Client\Keenetic3Client;
use App\DTO\StateDTO;
use App\DTO\WanDTO;
use App\Interfaces\HttpClientInterface;
use App\Services\CheckerService;
use App\Services\CustodyService;

class Keenetic3Router extends MultiWanRouter
{
    public function __construct(
        private CheckerService $checkerService,
        private StateDTO $stateDTO,
        protected string $url,
        protected string $username,
        protected string $password,
        private CustodyService $custodyService,
        private array $multiWan = [],
    ) {
        parent::__construct(
            $checkerService,
            $stateDTO,
            $url,
            $username,
            $password,
            $multiWan,
        );
    }

    private function httpClient(): HttpClientInterface
    {
        return $this->custodyService->get(
            $this->getProviderName(),
            [
                Keenetic3Client::class,
                [
                    'baseUrl' => $this->url,
                    'username' => $this->username,
                    'password' => $this->password,
                ]
            ]
        );
    }

    public function restartEvent(): void
    {
        abort_if(!$this->getStateDTO()->isRestartAllowed(), 400);

        $this->httpClient()->post('/rci/system/reboot', [
            'restart' => true,
        ]);
    }

    public function nextCase(): void
    {
        // todo
    }

    public function getWan(): WanDTO
    {
        foreach ($this->getMultiWanList() as $itemKey => $wanDTO) {
            if ($wanDTO->isActive()) {
                return $wanDTO;
            }
        }

         return new WanDTO(
             $this->getProviderName(),
             '',
             '',
             true,
             true,
         );
    }

    /**
     * @return WanDTO[]
     */
    protected function getMultiWanList(): iterable
    {
        if (!$this->isSwitchEnable()) {
            return [];
        }

        $response = $this->httpClient()
            ->get('/rci/show/interface');

        $interfaces = [];
        $connections = $response ? $response->json() : [];
        foreach ($connections as $device => $interface) {
            if (isset($interface['description'], $interface['address'], $interface['connected'])) {
                $interfaces[$device] = new WanDTO(
                    $interface['description'],
                    $interface['via'] ?? $device,
                    $interface['address'],
                    $interface['connected'] === 'yes',
                    $interface['defaultgw'] ?? false,
                );
            }
        }

        return $interfaces;
    }
}
