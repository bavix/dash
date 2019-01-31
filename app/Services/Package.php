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
        $this->active = true;
        foreach ($this->apps as $app) {
            $output = \systemCtl('is-active', $app);
            $status = $output[0] ?? 'inactive';
            if ($status === 'inactive') {
                $this->active = false;
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
        foreach ($this->apps as $app) {
            \systemCtl('stop', $app);
        }

        return $this->active();
    }

    /**
     * @return bool
     */
    public function stop(): bool
    {
        foreach ($this->apps as $app) {
            \systemCtl('start', $app);
        }

        return $this->active();
    }

    /**
     * @return bool
     */
    public function restart(): bool
    {
        foreach ($this->apps as $app) {
            \systemCtl('restart', $app);
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
        ];
    }

}
