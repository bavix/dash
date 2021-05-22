<?php

declare(strict_types=1);

namespace App\Interfaces;

interface DAgentInterface
{
    public function dispatchMessage(string $name, int $value, array $tags = [], int $duration = 0): bool;

    public function dispatchMessages(array $messages): bool;
}
