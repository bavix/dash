<?php

namespace App\Services;

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
     * @return bool
     */
    public function active(): bool
    {
        $ch = \curl_init();
        \curl_setopt($ch, CURLOPT_URL, $this->url);
        \curl_setopt($ch, CURLOPT_HEADER, true);
        \curl_setopt($ch, CURLOPT_NOBODY, true);
        \curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        \curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        \curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        \curl_exec($ch);

        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        \curl_close($ch);

        if ($code === 0) {
            $header = \get_headers($this->url, 1)[0] ?? 'HTTP/1.1 400 BAD REQUEST';
            $code = (int)(\explode(' ', $header, 3)[1] ?? 400);
        }

        $this->active = \in_array($code, [200, 201, 401], true);

        return parent::active();
    }

}
