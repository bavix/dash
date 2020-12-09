<?php

declare(strict_types=1);

namespace App\Units;

use App\DTO\StateDTO;
use App\Services\CheckerService;

class Grafana extends UnitAbstract
{
    private string $url;

    public function __construct(CheckerService $checkerService, StateDTO $stateDTO, string $url)
    {
        $this->url = $url;
        parent::__construct($checkerService, $stateDTO);
    }

    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setUrl($this->url)
            ->setWarning(false)
            ->setRestartAllowed(true)
            ->setStartAllowed(true)
            ->setStopAllowed(true)
            ->setTitle('Grafana')
            ->setColor('is-danger')
            ->setIcon(['fal', 'chart-area'])
            ->setGroupNames([['grafana']]);
    }
}
