<?php

namespace App\Services\Packages;

use App\Services\Package;

class NetData extends Package
{

    /**
     * @var string
     */
    protected $title = 'NetData';

    /**
     * @var array
     */
    protected $apps = [['netdata']];

    /**
     * @var string
     */
    protected $color = 'is-dark';

    /**
     * @var array
     */
    protected $icon = ['fal', 'chart-bar'];

}
