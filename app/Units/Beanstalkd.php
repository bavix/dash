<?php

namespace App\Units;

use App\DTO\StateDTO;

class Beanstalkd extends UnitAbstract
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setWarning(false)
            ->setRestartAllowed(true)
            ->setStartAllowed(true)
            ->setStopAllowed(true)
            ->setTitle('Beanstalkd')
            ->setColor('is-info')
            ->setIcon(['fal', 'chess-queen'])
            ->setGroupNames([['beanstalkd']]);
    }
}
