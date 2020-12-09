<?php

namespace App\Units;

use App\DTO\StateDTO;

class OpenSSH extends UnitAbstract
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setWarning(false)
            ->setRestartAllowed(true)
            ->setStartAllowed(true)
            ->setStopAllowed(true)
            ->setTitle('OpenSSH')
            ->setColor('is-black')
            ->setIcon(['fal', 'terminal'])
            ->setGroupNames([['sshd']]);
    }
}
