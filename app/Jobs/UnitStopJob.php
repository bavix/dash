<?php

namespace App\Jobs;

final class UnitStopJob extends AbstractUnitJob
{
    public function handle(): void
    {
        $this->unit->stopEvent();
        parent::handle();
    }
}
