<?php

namespace App\Jobs;

final class UnitRestartJob extends AbstractUnitJob
{
    public function handle(): void
    {
        $this->unit->restartEvent();
        parent::handle();
    }
}
