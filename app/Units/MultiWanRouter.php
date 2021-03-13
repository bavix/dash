<?php

declare(strict_types=1);

namespace App\Units;

use App\DTO\WanDTO;
use App\DTO\StateDTO;
use App\Services\CheckerService;

abstract class MultiWanRouter extends Router implements SwitchInterface
{
    public function __construct(
        private CheckerService $checkerService,
        private StateDTO $stateDTO,
        protected string $url,
        protected string $username,
        protected string $password,
        private array $multiWan = []
    ) {
        parent::__construct($checkerService, $stateDTO, $url, $username, $password);
    }

    public function isSwitchEnable(): bool
    {
        return (bool) ($this->multiWan['enable'] ?? false);
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'switchEnable' => $this->isSwitchEnable(),
            'switchName' => $this->getWan()->getName(),
        ]);
    }

    /** @return WanDTO[] */
    abstract protected function getMultiWanList(): iterable;
    abstract public function getWan(): WanDTO;
}
