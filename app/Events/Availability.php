<?php

namespace App\Events;

use App\Units\UnitInterface;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use JetBrains\PhpStorm\Pure;

/** @psalm-immutable */
final class Availability implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    #[Pure] public function __construct(private UnitInterface $unit) {
    }

    public function broadcastWith(): array
    {
        return $this->unit->toArray();
    }

    #[Pure] public function broadcastOn(): Channel
    {
        return new Channel('availability');
    }
}
