<?php

namespace App\Services\Packages;

use App\Services\Package;

class Grafana extends Package
{

    /**
     * @var string
     */
    protected $title = 'Grafana';

    /**
     * @var array
     */
    protected $apps = [['grafana']];

    /**
     * @var string
     */
    protected $color = 'is-warning';

    /**
     * @var array
     */
    protected $icon = ['fal', 'chart-area'];

}
