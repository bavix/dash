<?php

namespace App\Units;

use App\DTO\StateDTO;

class Nginx extends UnitAbstract
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setWarning(false)
            ->setRestartAllowed(true)
            ->setStartAllowed(true)
            ->setStopAllowed(true)
            ->setTitle('Nginx')
            ->setColor('is-link')
            ->setIcon(['fal', 'browser'])
            ->setGroupNames([['nginx']]);
    }
}
