<?php

namespace App\Events;

use App\Interfaces\DAgentInterface;
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
        $data = $this->unit->toArray();

        // tracking to dagent
        app(DAgentInterface::class)->dispatchMessage(
            'availability',
            (int) ($data['isStarted'] ?? 0),
            [
                'hostname' => gethostname(),
                'title' => $data['title'],
                'key' => $data['key'],
            ],
        );

        return $data;
    }

    #[Pure] public function broadcastOn(): Channel
    {
        return new Channel('availability');
    }
}
