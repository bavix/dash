<?php

namespace App\Events;

use App\Services\ServiceInterface;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Availability implements ShouldBroadcast
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var ServiceInterface
     */
    protected $service;

    /**
     * Create a new event instance.
     *
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @return array
     */
    public function broadcastWith(): array
    {
        return [
            'service' => $this->service->toArray(),
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('availability');
    }

}
