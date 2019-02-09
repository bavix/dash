<?php

namespace App\Services\Packages;

use App\Services\Package;

class Aria2 extends Package
{

    /**
     * @var string
     */
    protected $title = 'Aria2';

    /**
     * @var array
     */
    protected $apps = [['aria2']];

    /**
     * @var array
     */
    protected $icon = ['fal', 'download'];

    /**
     * @var string
     */
    protected $color = 'is-success';

}
