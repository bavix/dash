<?php

namespace App\Units;

use App\DTO\StateDTO;

class Netatalk extends UnitAbstract
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setWarning(false)
            ->setRestartAllowed(true)
            ->setStartAllowed(true)
            ->setStopAllowed(true)
            ->setTitle('Netatalk')
            ->setColor('is-danger')
            ->setIcon(['fal', 'hdd'])
            ->setGroupNames([['netatalk']]);
    }
}
