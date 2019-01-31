<?php

namespace App\Services;

class Docker extends Package
{

    /**
     * @return bool
     */
    public function active(): bool
    {
        $this->active = true;
        foreach ($this->apps as $app) {
            $app = \json_encode($app);
            \exec('docker ps | grep ' . $app, $output);
            if (!\count($output)) {
                $this->active = false;
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
        foreach ($this->apps as $app) {
            $app = \json_encode($app);
            \exec('docker start ' . $app);
        }

        return $this->active();
    }

    /**
     * @return bool
     */
    public function stop(): bool
    {
        foreach ($this->apps as $app) {
            $app = \json_encode($app);
            \exec('nohup docker stop ' . $app . ' >/dev/null 2>&1 &');
        }

        return $this->active();
    }

    /**
     * @return bool
     */
    public function restart(): bool
    {
        foreach ($this->apps as $app) {
            $app = \json_encode($app);
            \exec('docker restart ' . $app);
        }

        return $this->active();
    }

}
