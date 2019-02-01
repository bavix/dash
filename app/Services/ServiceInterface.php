<?php

namespace App\Services;

interface ServiceInterface
{

    /**
     * @return bool
     */
    public function stop(): bool;

    /**
     * @return bool
     */
    public function start(): bool;

    /**
     * @return bool
     */
    public function restart(): bool;

    /**
     * @return bool
     */
    public function active(): bool;

    /**
     * @return array
     */
    public function toArray(): array;

}
