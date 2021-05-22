<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\DAgentInterface;
use Bavix\DAgent\Client;
use Bavix\DAgent\MessageDto;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;

class DAgentClientService implements DAgentInterface
{
    /**
     * @throws ClientExceptionInterface|JsonException
     */
    public function dispatchMessage(string $name, int $value, array $tags = [], int $duration = 0): bool
    {
        $message = compact('name', 'value', 'tags', 'duration');

        return $this->dispatchMessages([$message]);
    }

    /**
     * @throws ClientExceptionInterface|JsonException
     */
    public function dispatchMessages(array $messages): bool
    {
        if (!config('dagent.enable', false)) {
            return false;
        }

        $values = [];
        foreach ($messages as $message) {
            $values[] = app(MessageDto::class, $message);
        }

        return 200 === app(Client::class, config('dagent'))
            ->dispatchMessages($values)
            ->getStatusCode();
    }
}
