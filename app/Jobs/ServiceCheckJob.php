<?php

namespace App\Jobs;

use App\Events\Availability;
use App\Services\ServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ServiceCheckJob implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \usleep(50);
        foreach (getPackages() as $package) {
            /**
             * @var ServiceInterface $service
             */
            $service = new $package();
            $service->active();

            event(new Availability($service));
        }
    }

}
