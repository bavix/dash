<?php

namespace App\Services\Packages;

use App\Services\Package;

class Supervisor extends Package
{

    /**
     * @var string
     */
    protected $title = 'Supervisor';

    /**
     * @var array
     */
    protected $apps = ['supervisord'];

    /**
     * @var string
     */
    protected $color = 'is-white';

    /**
     * @var array
     */
    protected $icon = ['fal', 'rocket'];

    /**
     * @var bool
     */
    protected $stopAllowed = false;

}
