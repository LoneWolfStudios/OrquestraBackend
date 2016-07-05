<?php

namespace Orquestra\Events\User;

use Orquestra\Constraint;
use Orquestra\ConstraintOccurrence;

use Orquestra\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ConstraintWasFired extends Event
{
    use SerializesModels;

    public $constraint;
    public $occurrence;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Constraint $constraint, ConstraintOccurrence $occurrence)
    {
        $this->constraint = $constraint;
        $this->occurrence = $occurrence;
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
