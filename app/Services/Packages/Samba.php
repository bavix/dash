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
    protected $apps = [['smb', 'nmb'], ['smbd', 'nmbd']];

    /**
     * @var array
     */
    protected $icon = ['fal', 'cloud-download-alt'];

}
