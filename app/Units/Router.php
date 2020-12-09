<?php

namespace App\Units;

use App\DTO\StateDTO;
use App\Services\CheckerService;
use Illuminate\Support\Facades\Http;

abstract class Router extends UnitAbstract
{
    protected string $url;
    protected string $username;
    protected string $password;

    public function __construct(
        CheckerService $checkerService,
        StateDTO $stateDTO,
        string $url,
        string $username,
        string $password
    ) {
        $this->url = $url;
        $this->username = $username;
        $this->password = $password;
        parent::__construct($checkerService, $stateDTO);
    }

    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setWarning(true)
            ->setEnableAlways(true)
            ->setRestartAllowed(true)
            ->setStartAllowed(false)
            ->setStopAllowed(false)
            ->setTitle('Router')
            ->setIcon(['fal', 'wifi']);
    }

    public function isStarted(): bool
    {
        return in_array(
            Http::timeout(3)->head($this->url)->status(),
            [200, 401],
            true
        );
    }
}
