<?php

namespace App\Services\Packages;

use App\Services\Package;

class Netatalk extends Package
{

    /**
     * @var string
     */
    protected $title = 'Netatalk';

    /**
     * @var array
     */
    protected $apps = [['netatalk']];

    /**
     * @var string
     */
    protected $color = 'is-danger';

    /**
     * @var array
     */
    protected $icon = ['fas', 'hdd'];

}
