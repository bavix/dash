<?php

namespace App\Jobs;

use App\Units\MultiWanRouter;
use App\Units\SwitchInterface;

final class UnitSwitchJob extends AbstractUnitJob
{
    protected SwitchInterface $switch;

    public function __construct(MultiWanRouter $service)
    {
        parent::__construct($service);
        $this->switch = $service;
    }

    public function handle(): void
    {
        $this->switch->nextCase();
        parent::handle();
    }
}
