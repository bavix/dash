<?php

namespace App\Units;

use App\DTO\StateDTO;

class Samba extends UnitAbstract
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setWarning(false)
            ->setRestartAllowed(true)
            ->setStartAllowed(true)
            ->setStopAllowed(true)
            ->setTitle('Samba')
            ->setColor('is-primary')
            ->setIcon(['fal', 'chart-network'])
            ->setGroupNames([['smb', 'nmb'], ['smbd', 'nmbd']]);
    }
}
