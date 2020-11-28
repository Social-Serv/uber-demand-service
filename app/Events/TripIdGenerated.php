<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TripIdGenerated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($tripInfoData)
    {
        $this->data = $tripInfoData;
    }

    public function broadcastOn()
    {
        return ['rider-channel-' . $this->data['client_id']];
    }

    public function broadcastAs()
    {
        return 'tripid-event';
    }
}
