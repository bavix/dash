<?php

namespace App\Services\Packages;

use App\Services\Package;

class Cron extends Package
{

    /**
     * @var string
     */
    protected $title = 'Cron';

    /**
     * @var array
     */
    protected $apps = [['cron'], ['cronie']];

    /**
     * @var string
     */
    protected $color = 'is-success';

    /**
     * @var array
     */
    protected $icon = ['fal', 'clock'];

}
