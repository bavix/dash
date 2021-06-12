<?php

declare(strict_types=1);

namespace App\Interfaces;

use Psr\Http\Client\ClientExceptionInterface;
use JsonException;

interface DAgentInterface
{
    /**
     * @throws ClientExceptionInterface|JsonException
     */
    public function dispatchMessage(string $name, int $value, array $tags = [], int $duration = 0): bool;

    /**
     * @throws ClientExceptionInterface|JsonException
     */
    public function dispatchMessages(array $messages): bool;
}
