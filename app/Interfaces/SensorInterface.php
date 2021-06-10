<?php

declare(strict_types=1);

namespace App\Interfaces;

interface SensorInterface
{
    public function getName(): string;
    public function getTags(): array;
    public function getValue(): int;
    public function asArray(): array;
}
