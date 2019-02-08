<?php

namespace App\Services;

use GuzzleHttp\Client;

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
     * @var Client
     */
    protected $guzzle;

    /**
     * Router constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        parent::__construct($options);
        $this->guzzle = new Client([
            'base_uri' => $this->url,
            'timeout'  => 10,
        ]);
    }

    /**
     * @return bool
     */
    public function active(): bool
    {
        $response = $this->guzzle->get('/');
        $this->active = \in_array(
            $response->getStatusCode(),
            [200, 201, 401],
            true
        );

        return parent::active();
    }

}
