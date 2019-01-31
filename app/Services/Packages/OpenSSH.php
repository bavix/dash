<?php

namespace App\Services\Packages;

use App\Services\Package;

class OpenSSH extends Package
{

    /**
     * @var string
     */
    protected $title = 'OpenSSH';

    /**
     * @var array
     */
    protected $apps = ['sshd'];

    /**
     * @var string
     */
    protected $color = 'is-black';

    /**
     * @var array
     */
    protected $icon = ['fal', 'terminal'];

}
