<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\HttpClientInterface;

/** @psalm-immutable */
final class CustodyService
{
    /** @var HttpClientInterface[] */
    private static array $instances = [];

    public function get(string $id, array $options): HttpClientInterface
    {
        if (!isset(self::$instances[$id])) {
            self::$instances[$id] = $this->instance($options);
        }

        return self::$instances[$id];
    }

    private function instance(array $options): HttpClientInterface
    {
        return app(...$options);
    }
}
