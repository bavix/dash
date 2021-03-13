<?php

namespace PHPSTORM_META {

    use App\Client\Keenetic3Client;
    use App\Services\CustodyService;
    use App\Services\SystemdService;
    use App\Services\CheckerService;
    use App\Services\UnitService;

    override(\app(0), map([
        CustodyService::class => CustodyService::class,
        Keenetic3Client::class => Keenetic3Client::class,
        SystemdService::class => SystemdService::class,
        CheckerService::class => CheckerService::class,
        UnitService::class => UnitService::class,
    ]));

}
