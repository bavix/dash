<?php

declare(strict_types=1);

namespace App\Client;

use App\Interfaces\HttpClientInterface;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use JetBrains\PhpStorm\Pure;

/**
 * @psalm-immutable
 */
final class Keenetic3Client implements HttpClientInterface
{
    private bool $attempt = false;
    private array $cookies = ['sysmode' => 'router'];
    private string $domain;

    #[Pure] public function __construct(
        private string $baseUrl,
        private string $username,
        private string $password,
        private int $timeout = 1
    ) {
        $this->cookies['_authorized'] = $this->username;
        $this->domain = (string) parse_url($baseUrl, PHP_URL_HOST);
    }

    public function get(string $url, ?array $query = null): ?Response
    {
        return $this->request(__FUNCTION__, ...func_get_args());
    }

    public function post(string $url, array $data = []): ?Response
    {
        return $this->request(__FUNCTION__, ...func_get_args());
    }

    private function request(string $method, ...$options): ?Response
    {
        try {
            $response =  $this->httpClient()->$method(...$options);

            if ($response->status() === 401 && $this->logIn() === true) {
                $response = $this->httpClient()->$method(...$options);
            }
        } catch (ConnectionException) {
            return null;
        }

        return $response;
    }

    private function tryDigestAuth(): Response
    {
        return $this->pendingRequest()
            ->withDigestAuth($this->username, $this->password)
            ->get('/auth');
    }

    private function getDigestHash(Response $response): string
    {
        $realm = $response->header('X-NDM-Realm');
        $challenge = $response->header('X-NDM-Challenge');
        $ha1 = md5(sprintf('%s:%s:%s', $this->username, $realm, $this->password));

        return hash('sha256', $challenge . $ha1);
    }

    private function httpClient(): PendingRequest
    {
        if ($this->attempt === false) {
            $this->attempt = true;
            $this->logIn();
        }

        return $this->httpClientWithCookies();
    }

    private function logIn(): bool
    {
        $responseDigest = $this->tryDigestAuth();
        foreach ($responseDigest->cookies()->getIterator() as $cookie) {
            $this->cookies[$cookie->getName()] = $cookie->getValue();
        }

        return 200 === $this->httpClientWithCookies()
            ->post('/auth', [
                'login' => $this->username,
                'password' => $this->getDigestHash($responseDigest),
            ])
            ->status();
    }

    private function httpClientWithCookies(): PendingRequest
    {
        return $this->pendingRequest()
            ->withCookies($this->cookies, $this->domain);
    }

    private function pendingRequest(): PendingRequest
    {
        return Http::timeout($this->timeout)
            ->withOptions(['debug' => true])
            ->baseUrl($this->baseUrl);
    }
}
