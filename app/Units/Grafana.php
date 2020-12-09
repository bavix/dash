<?php

declare(strict_types=1);

namespace App\Units;

use App\DTO\StateDTO;

class Grafana extends UnitAbstract
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
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
