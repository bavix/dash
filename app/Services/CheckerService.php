<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\StateDTO;

/**
 * @psalm-immutable
 */
final class CheckerService
{
    protected SystemdService $systemdService;

    public function __construct(SystemdService $systemdService)
    {
        $this->systemdService = $systemdService;
    }

    public function checkActivity(StateDTO $stateDTO): bool
    {
        foreach ($stateDTO->getGroupNames() as $names) {
            $iterator = $this->systemdService->checkActivity($names);
            $values = iterator_to_array($iterator, false);
            if (array_unique($values) === [true]) {
                return true;
            }
        }

        return false;
    }

    public function checkEnabled(StateDTO $stateDTO): bool
    {
        if ($stateDTO->isEnableAlways()) {
            return true;
        }

        $groupNames = $stateDTO->getGroupNames();
        foreach ($groupNames as $names) {
            $results = true;
            foreach ($this->systemdService->getNotActiveServiceList($names) as $name) {
                $values = iterator_to_array($this->systemdService->checkEnabled([$name]), false);
                if ($values !== [true]) {
                    $results = false;
                    break;
                }
            }

            if ($results) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param string $command
     * @param StateDTO $stateDTO
     *
     * @return void
     */
    public function command(string $command, StateDTO $stateDTO): void
    {
        $this->systemdService->command($command, array_merge(...$stateDTO->getGroupNames()));
    }
}
