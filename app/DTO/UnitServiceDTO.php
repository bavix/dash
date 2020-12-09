<?php

declare(strict_types=1);

namespace App\DTO;

final class UnitServiceDTO
{
    private string $class;
    private bool $enable;
    private ?array $options;

    private int $order = 0;

    public function __construct(string $class, bool $enable, ?array $options = [])
    {
        $this->class = $class;
        $this->enable = $enable;
        $this->options = $options;
    }

    public function getClass(): string
    {
        return $this->class;
    }

    public function isEnable(): bool
    {
        return $this->enable;
    }

    public function getOptions(): array
    {
        return $this->options ?? [];
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setOrder(int $order): self
    {
        $this->order = $order;

        return $this;
    }
}
