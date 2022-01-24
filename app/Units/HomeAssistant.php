<?php

namespace App\Units;

use App\DTO\StateDTO;

class HomeAssistant extends UnitAbstract
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setWarning(false)
            ->setRestartAllowed(true)
            ->setStartAllowed(true)
            ->setStopAllowed(true)
            ->setTitle('Home Assistant')
            ->setColor('is-danger')
            ->setIcon(['fal', 'house'])
            ->setGroupNames([['home-assistant']]);
    }
}
