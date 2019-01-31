<?php

namespace App\Services\Packages;

use App\Services\Package;

class Samba extends Package
{

    /**
     * @var string
     */
    protected $title = 'Samba';

    /**
     * @var array
     */
    protected $apps = [['smb', 'nmb']];

    /**
     * @var array
     */
    protected $icon = ['fas', 'cloud-download-alt'];

}
