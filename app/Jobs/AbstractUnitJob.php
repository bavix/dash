<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Events\Availability;
use App\Units\UnitInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

abstract class AbstractUnitJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected UnitInterface $unit;

    public function __construct(UnitInterface $service)
    {
        $this->unit = $service;
    }

    public function handle(): void
    {
        event(new Availability($this->unit));
    }

    public function failed(): void
    {
        event(new Availability($this->unit));
    }
}
