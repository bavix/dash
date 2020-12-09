<?php

namespace App\Units;

use App\DTO\StateDTO;

interface UnitInterface
{
    /**
     * @psalm-pure
     *
     * @return StateDTO
     */
    public function getStateDTO(): StateDTO;

    /**
     * @return bool
     */
    public function isEnabled(): bool;

    /**
     * @return void
     */
    public function stopEvent(): void;

    /**
     * @return void
     */
    public function startEvent(): void;

    /**
     * @return void
     */
    public function restartEvent(): void;

    /**
     * @return bool
     */
    public function isStarted(): bool;

    /**
     * @param string $providerName
     *
     * @return $this
     */
    public function setProviderName(string $providerName): self;

    /**
     * @return string
     */
    public function getProviderName(): string;

    /**
     * @return int
     */
    public function getOrder(): int;

    /**
     * @param int $order
     *
     * @return $this
     */
    public function setOrder(int $order): self;

    /**
     * @return array
     */
    public function toArray(): array;
}
