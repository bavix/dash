<?php

namespace App\Services\Packages;

use App\Services\Package;

class Linux extends Package
{

    /**
     * @var bool
     */
    protected $warning = true;

    /**
     * @var bool
     */
    protected $startAllowed = false;

    /**
     * @var bool
     */
    protected $active = true;

    /**
     * @var string
     */
    protected $title = 'Linux';

    /**
     * @var string
     */
    protected $color = 'is-light';

    /**
     * @var array
     */
    protected $icon = ['fab', 'linux'];

    /**
     * @return bool
     */
    public function stop(): bool
    {
        \exec('shutdown -P now');
        return true;
    }

    /**
     * @return bool
     */
    public function restart(): bool
    {
        \exec('shutdown -r now');
        return true;
    }

}
