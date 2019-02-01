<?php

if (!\function_exists('getPackages')) {
    function getPackages(): array
    {
        static $packages;
        if (!$packages) {
            $packages = \config('packages', []);
        }
        return $packages;
    }
}

if (!\function_exists('getServices')) {
    /**
     * @return \App\Services\ServiceInterface[]
     */
    function getServices(): array
    {
        static $services;

        if (!$services) {
            $order = 0;
            $services = [];
            foreach (getPackages() as $class => $options) {
                $options['order'] = $order;
                $order++;

                /**
                 * @var \App\Services\ServiceInterface $service
                 */
                $services[] = new $class($options);
            }
        }

        return $services;
    }
}
