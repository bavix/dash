<?php

namespace App\Services\Packages;

use App\Services\Package;

class Plex extends Package
{

    /**
     * @var string
     */
    protected $title = 'Plex';

    /**
     * @var array
     */
    protected $apps = [['plexmediaserver']];

    /**
     * @var string
     */
    protected $color = 'is-warning';

    /**
     * @var array
     */
    protected $icon = ['fal', 'video'];

}
