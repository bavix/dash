<?php

namespace App\Services\Packages;

use App\Services\Package;

class TeamViewer extends Package
{

    /**
     * @var string
     */
    protected $title = 'TeamViewer';

    /**
     * @var array
     */
    protected $apps = [['teamviewerd']];

    /**
     * @var array
     */
    protected $icon = ['fal', 'user-shield'];

    /**
     * @var string
     */
    protected $color = 'is-link';

}
