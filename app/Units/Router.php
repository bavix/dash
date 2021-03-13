<?php

namespace App\Units;

use App\DTO\StateDTO;
use App\Services\CheckerService;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

abstract class Router extends UnitAbstract
{
    public function __construct(
        private CheckerService $checkerService,
        private StateDTO $stateDTO,
        protected string $url,
        protected string $username,
        protected string $password
    ) {
        parent::__construct($checkerService, $stateDTO);
    }

    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setUrl($this->url)
            ->setWarning(true)
            ->setEnableAlways(true)
            ->setRestartAllowed(true)
            ->setStartAllowed(false)
            ->setStopAllowed(false)
            ->setTitle('Router')
            ->setIcon(['fal', 'wifi'])
            ->setColor('is-info');
    }

    public function isStarted(): bool
    {
        try {
            return in_array(
                Http::timeout(1)->head($this->url)->status(),
                [200, 401],
                true
            );
        } catch (ConnectionException) {
            return false;
        }
    }
}
