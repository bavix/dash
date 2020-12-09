<?php

namespace App\Console\Commands;

use App\Jobs\InspectorJob;
use Illuminate\Console\Command;
use Carbon\Carbon;

class ServiceCommand extends Command
{
    public function getName(): string
    {
        return 'service:check';
    }

    public function getDescription(): string
    {
        return __('Checks the status of services');
    }

    public function handle(): void
    {
        dispatch(new InspectorJob());
        dispatch(new InspectorJob())
            ->delay(Carbon::now()->addSeconds(30));
    }
}
