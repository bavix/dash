<?php

if (!\function_exists('getPackages')) {
    function getServices(): \Generator
    {
        // todo
    }
}

if (!\function_exists('getServices')) {
    /**
     * @return \App\Services\ServiceInterface[]
     */
    function getServices(): \Generator
    {
        static $services;
        static $packages;
        if (!$packages) {
            $packages = \config('packages', []);
        }

        if (!$services) {

        }

        $index = 0;
        foreach ($packages as $order => $package) {
            /**
             * @var \App\Services\ServiceInterface $service
             */
            $service = new $package();
            $service->setOrder($index);
            yield $service;
        }
    }
}
