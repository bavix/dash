<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\UnitServiceDTO;
use App\Units\UnitInterface;
use Generator;

/**
 * @psalm-immutable
 */
final class UnitService
{
    /**
     * @return Generator|UnitInterface[]
     */
    public function findAll(): Generator
    {
        foreach ($this->getUnits() as $providerName => $options) {
            $unit = $this->findUnit($providerName);
            if ($unit !== null) {
                yield $unit;
            }
        }
    }

    public function findUnit(string $providerName): ?UnitInterface
    {
        $unitServiceDTO = $this->getUnitServiceDTO($providerName);
        if ($unitServiceDTO === null || !$unitServiceDTO->isEnable()) {
            return null;
        }

        $unit = app($unitServiceDTO->getClass(), $unitServiceDTO->getOptions());
        if (!($unit instanceof UnitInterface)) {
            throw new \InvalidArgumentException('Unknown data provider: ' . $providerName);
        }

        return $unit
            ->setProviderName($providerName)
            ->setOrder($unitServiceDTO->getOrder());
    }

    private function getUnitServiceDTO(string $providerName): ?UnitServiceDTO
    {
        $units = $this->getUnits();
        $data = (array)($units[$providerName] ?? []);

        if (count($data) === 0) {
            return null;
        }

        $keys = array_keys($units);
        $order = array_search($providerName, $keys, true);

        return app(UnitServiceDTO::class, $data)
            ->setOrder((int)$order);
    }

    private function getUnits(): array
    {
        return config('units', []);
    }
}
