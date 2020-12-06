<?php

namespace App\Services;

abstract class Docker extends Package
{

    /**
     * @return bool
     *
     * @throws \JsonException
     */
    public function isStarted(): bool
    {
        /**
         * @var array $apps
         */
        foreach ($this->apps as $apps) {
            $this->active = true;
            foreach ($apps as $app) {
                $app = \json_encode($app, JSON_THROW_ON_ERROR);
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
     *
     * @throws \JsonException
     */
    public function start(): bool
    {
        if ($this->startAllowed) {
            /**
             * @var array $apps
             */
            foreach ($this->apps as $apps) {
                foreach ($apps as $app) {
                    $app = \json_encode($app);
                    \exec('docker start ' . $app);
                }
            }
        }

        return $this->isStarted();
    }

    /**
     * @return bool
     *
     * @throws \JsonException
     */
    public function stop(): bool
    {
        if ($this->stopAllowed) {
            /**
             * @var array $apps
             */
            foreach ($this->apps as $apps) {
                foreach ($apps as $app) {
                    $app = \json_encode($app, JSON_THROW_ON_ERROR);
                    \exec('nohup docker stop ' . $app . ' >/dev/null 2>&1 &');
                }
            }
        }

        return $this->isStarted();
    }

    /**
     * @return bool
     *
     * @throws \JsonException
     */
    public function restart(): bool
    {
        if ($this->restartAllowed) {
            /**
             * @var array $apps
             */
            foreach ($this->apps as $apps) {
                foreach ($apps as $app) {
                    $app = \json_encode($app, JSON_THROW_ON_ERROR);
                    \exec('docker restart ' . $app);
                }
            }
        }

        return $this->isStarted();
    }

}
