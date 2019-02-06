<?php

namespace App\Services\Packages;

use App\Services\Package;

class X2Go extends Package
{

    /**
     * @var string
     */
    protected $title = 'X2Go';

    /**
     * @var array
     */
    protected $apps = [['x2goserver']];

    /**
     * @var string
     */
    protected $color = 'is-warning';

    /**
     * @var array
     */
    protected $icon = ['fal', 'hexagon'];

}
