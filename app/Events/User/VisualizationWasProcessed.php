<?php

namespace Orquestra\Events\User;

use Orquestra\Visualization;

use Orquestra\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class VisualizationWasProcessed extends Event
{
    use SerializesModels;

    public $visualization;
    public $data; 
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Visualization $visualization, $data)
    {
        $this->visualization = $visualization;
        $this->data = $data;
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
