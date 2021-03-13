<?php

declare(strict_types=1);

namespace App\DTO;

class WanDTO
{
    public function __construct(
        private string $name,
        private string $device,
        private string $address,
        private bool $connected,
        private bool $active,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDevice(): string
    {
        return $this->device;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function isConnected(): bool
    {
        return $this->connected;
    }

    public function isActive(): bool
    {
        return $this->active;
    }
}
