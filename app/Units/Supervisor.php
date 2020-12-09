<?php

namespace App\Units;

use App\DTO\StateDTO;

class Supervisor extends UnitAbstract
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setWarning(false)
            ->setRestartAllowed(true)
            ->setStartAllowed(true)
            ->setStopAllowed(false)
            ->setTitle('Supervisor')
            ->setColor('is-white')
            ->setIcon(['fal', 'rocket'])
            ->setGroupNames([['supervisord'], ['supervisor']]);
    }
}
