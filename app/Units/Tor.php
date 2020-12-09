<?php

namespace App\Units;

use App\DTO\StateDTO;

class Tor extends UnitAbstract
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setWarning(false)
            ->setRestartAllowed(true)
            ->setStartAllowed(true)
            ->setStopAllowed(true)
            ->setTitle('Tor')
            ->setColor('is-black')
            ->setIcon(['fal', 'unlock'])
            ->setGroupNames([['tor']]);
    }
}
