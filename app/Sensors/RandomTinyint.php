<?php

declare(strict_types=1);

namespace App\Sensors;

use Exception;
use JetBrains\PhpStorm\Pure;

class RandomTinyint extends SensorAbstract
{
    public function getName(): string
    {
        return 'random_tinyint';
    }

    #[Pure] public function getTags(): array
    {
        return array_merge(parent::getTags(), [
            'pid' => getmypid(),
        ]);
    }

    /** @throws Exception */
    public function getValue(): int
    {
        return random_int(0, 128);
    }
}
