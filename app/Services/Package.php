<?php

namespace App\Services;

use App\PackageService;

abstract class Package implements ServiceInterface
{

    /**
     * @var bool
     */
    protected $warning = false;

    /**
     * @var bool
     */
    protected $restartAllowed = true;

    /**
     * @var bool
     */
    protected $startAllowed = true;

    /**
     * @var bool
     */
    protected $stopAllowed = true;

    /**
     * @var string
     */
    protected $color = 'is-primary';

    /**
     * @var bool
     */
    protected $active = false;

    /**
     * @var string[]
     */
    protected $apps = [];

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var array
     */
    protected $icon = [];

    /**
     * @var int
     */
    protected $order;

    /**
     * Package constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        foreach ($options as $name => $value) {
            if (property_exists($this, $name)) {
                $this->$name = $value;
            }
        }
    }

    /**
     * @return bool
     */
    public function active(): bool
    {
        /**
         * @var array $apps
         */
        foreach ($this->apps as $apps) {
            $this->active = true;
            foreach ($apps as $app) {
                if (!app(PackageService::class)->isActive($app)) {
                    $this->active = false;
                    break;
                }
            }

            if ($this->active) {
                break;
            }
        }

        return $this->active;
    }

    /**
     * @return bool
     * @throws
     */
    public function start(): bool
    {
        if ($this->startAllowed) {
            /**
             * @var array $apps
             */
            foreach ($this->apps as $apps) {
                foreach ($apps as $app) {
                    app(PackageService::class)->systemCtl('start', $app);
                }
            }
        }

        return $this->active();
    }

    /**
     * @return bool
     * @throws
     */
    public function stop(): bool
    {
        if ($this->stopAllowed) {
            /**
             * @var array $apps
             */
            foreach ($this->apps as $apps) {
                foreach ($apps as $app) {
                    app(PackageService::class)->systemCtl('stop', $app);
                }
            }
        }

        return $this->active();
    }

    /**
     * @return bool
     * @throws
     */
    public function restart(): bool
    {
        if ($this->restartAllowed) {
            /**
             * @var array $apps
             */
            foreach ($this->apps as $apps) {
                foreach ($apps as $app) {
                    app(PackageService::class)->systemCtl('restart', $app);
                }
            }
        }

        return $this->active();
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'submitting' => false,
            'key' => static::class,
            'title' => $this->title,
            'description' => $this->description,
            'warning' => $this->warning,
            'restartAllowed' => $this->restartAllowed,
            'startAllowed' => $this->startAllowed,
            'stopAllowed' => $this->stopAllowed,
            'color' => $this->color,
            'active' => $this->active,
            'url' => $this->url,
            'icon' => $this->icon,
            'order' => $this->order,
            'time' => \time(),
        ];
    }

}
