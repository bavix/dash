<?php

namespace App\Console\Commands;

use App\Jobs\ServiceCheckJob;
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
        dispatch(new ServiceCheckJob());
    }

}
