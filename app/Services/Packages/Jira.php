<?php

namespace App\Services\Packages;

use App\Services\Package;

class Jira extends Package
{

    /**
     * @var string
     */
    protected $title = 'Jira';

    /**
     * @var array
     */
    protected $apps = [['jira']];

    /**
     * @var string
     */
    protected $color = 'is-link';

    /**
     * @var array
     */
    protected $icon = ['fab', 'jira'];

}
