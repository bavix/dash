<?php

declare(strict_types=1);

namespace App\Units;

interface SwitchInterface
{
    public function nextCase(): void;
}
