<?php

namespace App\Units;

use App\DTO\StateDTO;

class Aria2 extends UnitAbstract
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setWarning(false)
            ->setRestartAllowed(true)
            ->setStartAllowed(true)
            ->setStopAllowed(true)
            ->setTitle('Aria2')
            ->setColor('is-success')
            ->setIcon(['fal', 'magnet'])
            ->setGroupNames([['aria2']]);
    }
}
