<?php

namespace App\Units;

use App\DTO\StateDTO;

class NetData extends UnitAbstract
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setWarning(false)
            ->setRestartAllowed(true)
            ->setStartAllowed(true)
            ->setStopAllowed(true)
            ->setTitle('NetData')
            ->setColor('is-dark')
            ->setIcon(['fal', 'chart-bar'])
            ->setGroupNames([['netdata']]);
    }
}
