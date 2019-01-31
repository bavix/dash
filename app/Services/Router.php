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
     * @var string
     */
    protected $address;

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
        \curl_setopt($ch, CURLOPT_URL, $this->address);
        \curl_setopt($ch, CURLOPT_NOBODY, true);
        \curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,5);
        \curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        \curl_exec($ch);

        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->active = $code; \in_array($code, [401, 200, 201], true);
        \curl_close($ch);

        return parent::active();
    }

}
