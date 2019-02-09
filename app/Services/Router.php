<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

abstract class Router extends Package
{

    /**
     * @var bool
     */
    protected $warning = true;

    /**
     * @var string
     */
    protected $title = 'Router';

    /**
     * @var array
     */
    protected $icon = ['fal', 'wifi'];

    /**
     * @var bool
     */
    protected $startAllowed = false;

    /**
     * @var bool
     */
    protected $stopAllowed = false;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @return Client
     */
    protected function guzzle(): Client
    {
        static $guzzle;
        if (!$guzzle) {
            $guzzle = new Client([
                'base_uri' => $this->url,
                'timeout'  => 10,
            ]);
        }

        return $guzzle;
    }

    /**
     * @return bool
     */
    public function active(): bool
    {
        try {
            $response = $this->guzzle()->get('/', [
                'auth' => [$this->username, $this->password]
            ]);
            $code = $response->getStatusCode();
        } catch (ClientException $exception) {
            $code = $exception->getCode();
        }

        $this->active = $code === 200;
        return parent::active();
    }

}
