<?php

namespace App\Units;

use App\DTO\StateDTO;

class PostgreSQL extends UnitAbstract
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setWarning(false)
            ->setRestartAllowed(true)
            ->setStartAllowed(true)
            ->setStopAllowed(true)
            ->setTitle('Postgres')
            ->setColor('is-dark')
            ->setIcon(['fal', 'database'])
            ->setGroupNames([['postgresql']]);
    }
}
