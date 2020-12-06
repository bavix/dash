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
    protected $enableAll = false;

    /**
     * @var bool
     */
    protected $enabled = false;

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
    public function isEnabled(): bool
    {
        if ($this->enableAll) {
            return true;
        }

        /**
         * @var array $apps
         */
        foreach ($this->apps as $apps) {
            $this->enabled = true;
            foreach ($apps as $app) {
                if (!app(PackageService::class)->isEnabled($app)) {
                    $this->enabled = false;
                    break;
                }
            }

            if ($this->enabled) {
                break;
            }
        }

        return $this->enabled;
    }

    /**
     * @return bool
     */
    public function isStarted(): bool
    {
        /**
         * @var array $apps
         */
        foreach ($this->apps as $apps) {
            $this->active = true;
            foreach ($apps as $app) {
                if (!app(PackageService::class)->isStarted($app)) {
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
                    app(PackageService::class)
                        ->systemCtl('start', $app);
                }
            }
        }

        return $this->isStarted();
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
                    app(PackageService::class)
                        ->systemCtl('stop', $app);
                }
            }
        }

        return $this->isStarted();
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
                    app(PackageService::class)
                        ->systemCtl('restart', $app);
                }
            }
        }

        return $this->isStarted();
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $isEnabled = $this->isEnabled();

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
            'isEnabled' => $isEnabled,
            'isStarted' => $isEnabled && $this->isStarted(),
            'url' => $this->url,
            'icon' => $this->icon,
            'order' => $this->order,
            'time' => \time(),
        ];
    }

}
