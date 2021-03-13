<?php

namespace App\Units;

use App\DTO\StateDTO;
use App\Services\CheckerService;

class NetData extends UnitAbstract
{
    public function __construct(
        private CheckerService $checkerService,
        private StateDTO $stateDTO,
        private string $url
    ) {
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
            ->setTitle('NetData')
            ->setColor('is-dark')
            ->setIcon(['fal', 'chart-bar'])
            ->setGroupNames([['netdata']]);
    }
}
