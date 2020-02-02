<?php

namespace App\Services\Packages;

use App\Services\Package;

class PostgreSQL extends Package
{

    /**
     * @var string
     */
    protected $title = 'Postgres';

    /**
     * @var array
     */
    protected $apps = [['postgresql']];

    /**
     * @var array
     */
    protected $icon = ['fal', 'database'];

    /**
     * @var string
     */
    protected $color = 'is-dark';

}
