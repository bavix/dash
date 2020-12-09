<?php

namespace App\Events;

use App\Units\UnitInterface;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

final class Availability implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected UnitInterface $unit;

    public function __construct(UnitInterface $unit)
    {
        $this->unit = $unit;
    }

    public function broadcastWith(): array
    {
        return $this->unit->toArray();
    }

    public function broadcastOn(): Channel
    {
        return new Channel('availability');
    }
}
