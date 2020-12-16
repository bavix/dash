<?php

namespace App\Units;

use App\DTO\StateDTO;

class X2Go extends UnitAbstract
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setWarning(false)
            ->setRestartAllowed(true)
            ->setStartAllowed(true)
            ->setStopAllowed(true)
            ->setSpin(true)
            ->setTitle('X2Go')
            ->setColor('is-warning')
            ->setIcon(['fal', 'hexagon'])
            ->setGroupNames([['x2goserver']]);
    }
}
