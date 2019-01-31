<?php

namespace App\Services;

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
     * @param int $order
     */
    public function setOrder(int $order): void
    {
        $this->order = $order;
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
                $output = \systemCtl('is-active', $app);
                $status = $output[0] ?? 'inactive';
                if ($status === 'inactive') {
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
     */
    public function start(): bool
    {
        /**
         * @var array $apps
         */
        foreach ($this->apps as $apps) {
            foreach ($apps as $app) {
                \systemCtl('stop', $app);
            }
        }

        return $this->active();
    }

    /**
     * @return bool
     */
    public function stop(): bool
    {
        /**
         * @var array $apps
         */
        foreach ($this->apps as $apps) {
            foreach ($apps as $app) {
                \systemCtl('start', $app);
            }
        }

        return $this->active();
    }

    /**
     * @return bool
     */
    public function restart(): bool
    {
        /**
         * @var array $apps
         */
        foreach ($this->apps as $apps) {
            foreach ($apps as $app) {
                \systemCtl('restart', $app);
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
