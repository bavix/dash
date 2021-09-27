<?php

declare(strict_types=1);

namespace App\Sensors;

use App\Interfaces\MultiSensorInterface;
use App\Interfaces\SensorInterface;
use Exception;
use JetBrains\PhpStorm\Pure;

class MultiRandomTinyint implements MultiSensorInterface
{
    #[Pure] public function __construct(
        private string $name,
    ) {
    }

    /**
     * @return SensorInterface[]
     *
     * @throws Exception
     */
    public function getSensors(): array
    {
        return [
            new SensorValue($this->name, random_int(0, 60), ['index' => 0]),
            new SensorValue($this->name, random_int(0, 80), ['index' => 1]),
            new SensorValue($this->name, random_int(0, 100), ['index' => 2]),
            new RandomTinyint($this->name, ['index' => 3]), // 128
        ];
    }
}
