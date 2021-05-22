<?php

namespace App\Providers;

use App\Interfaces\DAgentInterface;
use App\Services\CustodyService;
use App\Services\DAgentClientService;
use App\Services\SystemdService;
use App\Services\CheckerService;
use App\Services\UnitService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::bind('service', static function (string $name) {
            return app(UnitService::class)
                ->findUnit($name);
        });
    }

    public function register(): void
    {
        $this->app->singleton(DAgentInterface::class, DAgentClientService::class);
        $this->app->singleton(CustodyService::class);
        $this->app->singleton(SystemdService::class);
        $this->app->singleton(CheckerService::class);
        $this->app->singleton(UnitService::class);
    }
}
