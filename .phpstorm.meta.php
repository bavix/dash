<?php

namespace PHPSTORM_META {

    use App\PackageService;

    override(\app(0), map([
        PackageService::class => PackageService::class,
    ]));

}
