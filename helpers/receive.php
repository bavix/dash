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
                $options['enable'] = $options['enable'] ?? false;
                $options['order'] = $order;
                $order++;

                if (!$options['enable']) {
                    continue;
                }

                /**
                 * @var \App\Services\ServiceInterface $service
                 */
                $services[$class] = new $class($options);
            }
        }

        return $services;
    }
}

if (!\function_exists('getService')) {
    /**
     * @param string $class
     * @return \App\Services\ServiceInterface
     */
    function getService(string $class): \App\Services\ServiceInterface
    {
        $services = getServices();
        if (empty($services[$class])) {
            throw new RuntimeException('Service not found');
        }
        return $services[$class];
    }
}
