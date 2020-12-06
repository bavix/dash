<?php

namespace App\Services;

interface ServiceInterface
{
    /**
     * @return bool
     */
    public function isEnabled(): bool;

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
    public function isStarted(): bool;

    /**
     * @return array
     */
    public function toArray(): array;
}
