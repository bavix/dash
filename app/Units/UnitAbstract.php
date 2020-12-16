<?php

declare(strict_types=1);

namespace App\Units;

use App\DTO\StateDTO;
use App\Services\CheckerService;
use function time;

abstract class UnitAbstract implements UnitInterface
{
    private CheckerService $checkerService;
    private StateDTO $stateDTO;
    private ?string $providerName = null;
    private int $order = 0;

    public function __construct(CheckerService $checkerService, StateDTO $stateDTO)
    {
        $this->checkerService = $checkerService;
        $this->stateDTO = $this->configureStateDTO($stateDTO);
    }

    public function stopEvent(): void
    {
        abort_if(!$this->getStateDTO()->isStopAllowed(), 400);

        $this->checkerService->command('stop', $this->getStateDTO());
    }

    public function startEvent(): void
    {
        abort_if(!$this->getStateDTO()->isStartAllowed(), 400);

        $this->checkerService->command('start', $this->getStateDTO());
    }

    public function restartEvent(): void
    {
        abort_if(!$this->getStateDTO()->isRestartAllowed(), 400);

        $this->checkerService->command('restart', $this->getStateDTO());
    }

    public function getStateDTO(): StateDTO
    {
        return $this->stateDTO;
    }

    public function isEnabled(): bool
    {
        return $this->checkerService->checkEnabled($this->stateDTO);
    }

    public function isStarted(): bool
    {
        return $this->checkerService->checkActivity($this->stateDTO);
    }

    public function setProviderName(string $providerName): self
    {
        $this->providerName = $providerName;

        return $this;
    }

    public function getProviderName(): string
    {
        return $this->providerName;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setOrder(int $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function toArray(): array
    {
        $stateDTO = $this->getStateDTO();
        $isEnabled = $this->isEnabled();

        return [
            'submitting' => false,
            'key' => $this->getProviderName(),
            'title' => $stateDTO->getTitle(),
            'warning' => $stateDTO->isWarning(),
            'spin' => $stateDTO->isSpin(),
            'restartAllowed' => $stateDTO->isRestartAllowed(),
            'startAllowed' => $stateDTO->isStartAllowed(),
            'stopAllowed' => $stateDTO->isStopAllowed(),
            'color' => $stateDTO->getColor(),
            'isEnabled' => $isEnabled,
            'isStarted' => $isEnabled && $this->isStarted(),
            'url' => $stateDTO->getUrl(),
            'icon' => $stateDTO->getIcon(),
            'order' => $this->getOrder(),
            'time' => time(),
        ];
    }

    abstract protected function configureStateDTO(StateDTO $stateDTO): StateDTO;
}
