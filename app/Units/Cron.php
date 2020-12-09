<?php

namespace App\Units;

use App\DTO\StateDTO;

class Cron extends UnitAbstract
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setWarning(false)
            ->setRestartAllowed(true)
            ->setStartAllowed(true)
            ->setStopAllowed(true)
            ->setTitle('Cron')
            ->setColor('is-success')
            ->setIcon(['fal', 'clock'])
            ->setGroupNames([['cron'], ['cronie']]);
    }
}
