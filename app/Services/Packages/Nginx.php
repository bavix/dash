<?php

namespace App\Services\Packages;

use App\Services\Package;

class Nginx extends Package
{

    /**
     * @var string
     */
    protected $title = 'Nginx';

    /**
     * @var array
     */
    protected $apps = [['nginx']];

    /**
     * @var string
     */
    protected $color = 'is-warning';

    /**
     * @var array
     */
    protected $icon = ['fal', 'browser'];

}
