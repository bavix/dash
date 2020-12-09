<?php

namespace App\Units;

use App\DTO\StateDTO;

class Plex extends UnitAbstract
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setWarning(false)
            ->setRestartAllowed(true)
            ->setStartAllowed(true)
            ->setStopAllowed(true)
            ->setTitle('Plex')
            ->setColor('is-warning')
            ->setIcon(['fal', 'video'])
            ->setGroupNames([['plexmediaserver']]);
    }
}
