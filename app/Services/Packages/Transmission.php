<?php

namespace App\Services\Packages;

use App\Services\Package;

class Transmission extends Package
{

    /**
     * @var string
     */
    protected $title = 'Torrent';

    /**
     * @var array
     */
    protected $apps = [['transmission'], ['transmission-daemon']];

    /**
     * @var array
     */
    protected $icon = ['fal', 'download'];

    /**
     * @var string
     */
    protected $color = 'is-success';

}
