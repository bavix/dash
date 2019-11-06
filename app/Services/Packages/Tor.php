<?php

namespace App\Services\Packages;

use App\Services\Package;

class Tor extends Package
{

    /**
     * @var string
     */
    protected $title = 'Tor';

    /**
     * @var array
     */
    protected $apps = [['tor']];

    /**
     * @var string
     */
    protected $color = 'is-black';

    /**
     * @var array
     */
    protected $icon = ['fal', 'unlock'];

}
