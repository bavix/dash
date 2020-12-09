<?php

namespace App\Jobs;

final class UnitStartJob extends AbstractUnitJob
{
    public function handle(): void
    {
        $this->unit->startEvent();
        parent::handle();
    }
}
