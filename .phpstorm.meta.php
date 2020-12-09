<?php

namespace PHPSTORM_META {

    use App\Services\SystemdService;
    use App\Services\CheckerService;
    use App\Services\UnitService;

    override(\app(0), map([
        SystemdService::class => SystemdService::class,
        CheckerService::class => CheckerService::class,
        UnitService::class => UnitService::class,
    ]));

}
