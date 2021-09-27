<?php

declare(strict_types=1);

namespace App\Interfaces;

use JetBrains\PhpStorm\Pure;

interface MultiSensorInterface
{
    /** @return SensorInterface[] */
    #[Pure] public function getSensors(): array;
}
