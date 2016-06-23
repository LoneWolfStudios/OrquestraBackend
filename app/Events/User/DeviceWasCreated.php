<?php

namespace Orquestra\Events\User;

use Orquestra\Device;

use Orquestra\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DeviceWasCreated extends Event
{
    use SerializesModels;

    public $device;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Device $device)
    {
        $this->device = $device;
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
