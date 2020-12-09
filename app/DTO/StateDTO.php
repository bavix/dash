<?php

declare(strict_types=1);

namespace App\DTO;

final class StateDTO
{
    /** @var bool Show warning (modal window) */
    private bool $warning = false;

    private bool $restartAllowed = false;
    private bool $startAllowed = false;
    private bool $stopAllowed = false;

    private bool $enableAlways = false;
    private bool $enable = false;
    private bool $active = false;

    private array $groupNames = [];

    private string $title;
    private ?string $url = null;

    private string $color;
    private array $icon;

    public function isWarning(): bool
    {
        return $this->warning;
    }

    public function setWarning(bool $warning): self
    {
        $this->warning = $warning;

        return $this;
    }

    public function isRestartAllowed(): bool
    {
        return $this->restartAllowed;
    }

    public function setRestartAllowed(bool $restartAllowed): self
    {
        $this->restartAllowed = $restartAllowed;

        return $this;
    }

    public function isStartAllowed(): bool
    {
        return $this->startAllowed;
    }

    public function setStartAllowed(bool $startAllowed): self
    {
        $this->startAllowed = $startAllowed;

        return $this;
    }

    public function isStopAllowed(): bool
    {
        return $this->stopAllowed;
    }

    public function setStopAllowed(bool $stopAllowed): self
    {
        $this->stopAllowed = $stopAllowed;

        return $this;
    }

    public function isEnableAlways(): bool
    {
        return $this->enableAlways;
    }

    public function setEnableAlways(bool $enableAlways): self
    {
        $this->enableAlways = $enableAlways;

        return $this;
    }

    public function isEnable(): bool
    {
        return $this->enable;
    }

    public function setEnable(bool $enable): self
    {
        $this->enable = $enable;

        return $this;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return string[][]
     */
    public function getGroupNames(): array
    {
        return $this->groupNames;
    }

    /**
     * @param string[][] $groupNames
     *
     * @return self
     */
    public function setGroupNames(array $groupNames): self
    {
        $this->groupNames = $groupNames;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getIcon(): array
    {
        return $this->icon;
    }

    /**
     * @param string[] $icon
     *
     * @return self
     */
    public function setIcon(array $icon): self
    {
        $this->icon = $icon;

        return $this;
    }
}
