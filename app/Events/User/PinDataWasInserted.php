<?php

namespace Orquestra\Events\User;

use Orquestra\Device;

use Illuminate\Http\Request;

use Orquestra\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PinDataWasInserted extends Event
{
    use SerializesModels;

    public $request;
    public $device;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Device $device, Request $request)
    {
        $this->device = $device;
        $this->request = $request;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
