<?php

declare(strict_types=1);

namespace App\Interfaces;

use JetBrains\PhpStorm\Pure;

interface SensorInterface
{
    #[Pure] public function getName(): string;
    #[Pure] public function getTags(): array;
    public function getValue(): int;
}
