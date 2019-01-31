<?php

namespace App\Services;

interface ServiceInterface
{

    /**
     * @param int $order
     */
    public function setOrder(int $order): void;

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
