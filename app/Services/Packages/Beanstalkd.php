<?php

namespace App\Services\Packages;

use App\Services\Package;

class Beanstalkd extends Package
{

    /**
     * @var string
     */
    protected $title = 'Beanstalkd';

    /**
     * @var array
     */
    protected $apps = [['beanstalkd']];

    /**
     * @var array
     */
    protected $icon = ['fal', 'chess-queen'];

    /**
     * @var string
     */
    protected $color = 'is-info';

}
