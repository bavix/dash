<?php

if (!\function_exists('getPackages')) {
    function getPackages(): array
    {
        $filter = \array_filter(\config('packages', []));
        return \array_keys($filter);
    }
}

if (!\function_exists('getServices')) {
    /**
     * @return \App\Services\ServiceInterface[]
     */
    function getServices(): \Generator
    {
        foreach (getPackages() as $order => $package) {
            /**
             * @var \App\Services\ServiceInterface $service
             */
            $service = new $package();
            $service->setOrder($order);
            yield $service;
        }
    }
}
