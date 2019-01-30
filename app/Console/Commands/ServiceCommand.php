<?php

namespace App\Console\Commands;

use App\Events\Availability;
use App\Services\Packages\Linux;
use App\Services\ServiceInterface;
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
     * @var array
     */
    protected $packages = [
        Linux::class,
    ];

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        foreach ($this->packages as $package) {
            /**
             * @var ServiceInterface $service
             */
            $service = new $package();
            $service->active();

            event(new Availability($service));
        }
    }

}
