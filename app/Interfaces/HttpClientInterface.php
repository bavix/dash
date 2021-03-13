<?php

declare(strict_types=1);

namespace App\Interfaces;

use Illuminate\Http\Client\Response;

interface HttpClientInterface
{
    public function get(string $url, ?array $query = null): ?Response;
    public function post(string $url, array $data = []): ?Response;
}
