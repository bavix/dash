<?php

declare(strict_types=1);

namespace App\Sensors;

use App\Interfaces\SensorInterface;
use Exception;
use JetBrains\PhpStorm\Pure;

class SensorValue implements SensorInterface
{
    #[Pure] public function __construct(
        private string $name,
        private int $value,
        private array $tags = []
    ) {
    }

    #[Pure] public function getName(): string
    {
        return $this->name;
    }

    #[Pure] public function getTags(): array
    {
        return $this->tags;
    }

    /** @throws Exception */
    public function getValue(): int
    {
        return $this->value;
    }
}
