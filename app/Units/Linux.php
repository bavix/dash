<?php

namespace App\Units;

use App\DTO\StateDTO;

class Linux extends UnitAbstract
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setWarning(true)
            ->setEnableAlways(true)
            ->setRestartAllowed(true)
            ->setStartAllowed(false)
            ->setStopAllowed(true)
            ->setEnable(true)
            ->setTitle('Linux')
            ->setColor('is-white')
            ->setIcon(['fab', 'linux']);
    }

    public function stopEvent(): void
    {
        \exec('shutdown -P now');
    }

    public function restartEvent(): void
    {
        \exec('shutdown -r now');
    }

    public function isStarted(): bool
    {
        return true;
    }
}
