<?php

namespace App\Console\Commands;

use App\Jobs\InspectorJob;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ServiceCommand extends Command
{

    /**
     * @var string
     */
    protected $signature = 'service:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Проверяет состояние пакетов';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        dispatch(new InspectorJob());
        dispatch(new InspectorJob())
            ->delay(Carbon::now()->addSeconds(30));
    }

}
