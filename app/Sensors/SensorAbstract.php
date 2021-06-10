<?php

declare(strict_types=1);

namespace App\Sensors;

use App\Interfaces\SensorInterface;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use function gethostname;

abstract class SensorAbstract implements SensorInterface
{
    #[Pure]
    #[ArrayShape(['hostname' => "string"])]
    public function getTags(): array
    {
        return ['hostname' => gethostname()];
    }

    #[ArrayShape(['name' => "string", 'value' => "int", 'tags' => "array"])]
    public function asArray(): array
    {
        return [
            'name' => $this->getName(),
            'value' => $this->getValue(),
            'tags' => $this->getTags(),
        ];
    }
}
