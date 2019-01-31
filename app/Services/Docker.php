<?php

namespace App\Services;

abstract class Docker extends Package
{

    /**
     * @return bool
     */
    public function active(): bool
    {
        /**
         * @var array $apps
         */
        foreach ($this->apps as $apps) {
            $this->active = true;
            foreach ($apps as $app) {
                $app = \json_encode($app);
                \exec('docker ps | grep ' . $app, $output);
                if (!\count($output)) {
                    $this->active = false;
                    break;
                }
            }

            if ($this->active) {
                break;
            }
        }

        return $this->active;
    }

    /**
     * @return bool
     */
    public function start(): bool
    {
        /**
         * @var array $apps
         */
        foreach ($this->apps as $apps) {
            foreach ($apps as $app) {
                $app = \json_encode($app);
                \exec('docker start ' . $app);
            }
        }

        return $this->active();
    }

    /**
     * @return bool
     */
    public function stop(): bool
    {
        /**
         * @var array $apps
         */
        foreach ($this->apps as $apps) {
            foreach ($apps as $app) {
                $app = \json_encode($app);
                \exec('nohup docker stop ' . $app . ' >/dev/null 2>&1 &');
            }
        }

        return $this->active();
    }

    /**
     * @return bool
     */
    public function restart(): bool
    {
        /**
         * @var array $apps
         */
        foreach ($this->apps as $apps) {
            foreach ($apps as $app) {
                $app = \json_encode($app);
                \exec('docker restart ' . $app);
            }
        }

        return $this->active();
    }

}
