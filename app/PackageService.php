<?php

namespace App;

use App\Services\ServiceInterface;

class PackageService
{

    /**
     * @var array
     */
    protected $packages;

    /**
     * @var array
     */
    protected $services;

    /**
     * @return array
     */
    public function getPackages(): array
    {
        if ($this->packages === null) {
            $this->packages = \config('packages', []);
        }

        return $this->packages;
    }

    /**
     * @return array
     */
    public function getServices(): array
    {
        if ($this->services === null) {
            $order = 0;
            $this->services = [];
            foreach ($this->getPackages() as $class => $options) {
                $options['enable'] = $options['enable'] ?? false;
                $options['order'] = $order;
                $order++;

                if (!$options['enable']) {
                    continue;
                }

                /**
                 * @var ServiceInterface $service
                 */
                $this->services[$class] = new $class($options);
            }
        }

        return $this->services;
    }

    /**
     * @param string|null $class
     * @return ServiceInterface
     */
    public function getService(?string $class): ServiceInterface
    {
        abort_if(!class_exists($class), 400, 'Adapter not found');
        $services = $this->getServices();
        abort_if(empty($services[$class]), 400, 'Service not found');
        return $services[$class];
    }

    /**
     * @param string $options
     * @param string $app
     * @return array
     */
    public function systemCtl(string $options, string $app): array
    {
        $appName = \json_encode($app);
        \exec("systemctl $options $appName", $output);
        return (array)$output;
    }

    /**
     * @param string $app
     * @return bool
     */
    public function isActive(string $app): bool
    {
        $output = $this->systemCtl('is-active', $app);
        $status = $output[0] ?? 'inactive';
        return $status === 'active';
    }

}
