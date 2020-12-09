<?php

namespace App\Units;

use App\DTO\StateDTO;

class TeamViewer extends UnitAbstract
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setWarning(false)
            ->setRestartAllowed(true)
            ->setStartAllowed(true)
            ->setStopAllowed(true)
            ->setTitle('TeamViewer')
            ->setColor('is-link')
            ->setIcon(['fal', 'user-shield'])
            ->setGroupNames([['teamviewerd']]);
    }
}
