<?php

namespace App\Units;

use App\DTO\StateDTO;
use App\Services\CheckerService;

class Transmission extends UnitAbstract
{
    private string $url;

    public function __construct(CheckerService $checkerService, StateDTO $stateDTO, string $url)
    {
        $this->url = $url;
        parent::__construct($checkerService, $stateDTO);
    }

    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return $stateDTO
            ->setUrl($this->url)
            ->setWarning(false)
            ->setRestartAllowed(true)
            ->setStartAllowed(true)
            ->setStopAllowed(true)
            ->setTitle('Transmission')
            ->setColor('is-success')
            ->setIcon(['fal', 'download'])
            ->setGroupNames([['transmission'], ['transmission-daemon']]);
    }
}
