<?php

namespace Orquestra\Listeners\User;

use Event;
use Orquestra\Events\User\ConstraintWasFired;

use Orquestra\Constraint;
use Orquestra\ConstraintOccurrence;

use Orquestra\Events\User\VisualizationWasProcessed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConstraintProcessing
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  VisualizationWasProcessed  $event
     * @return void
     */
    public function handle(VisualizationWasProcessed $event)
    {
        $constraints = Constraint::where('active', true)
                                 ->where('visualization_id', $event->visualization->id)
                                 ->get();
        
        foreach ($constraints as $constraint) 
        {
            $fired = false;
            
            if ($constraint->type == "maior") 
            {
                if ($event->data->value > $constraint->value) 
                {
                    $fired = true;
                }
            }
            else if ($constraint->type == "maior igual") 
            {
                if ($event->data->value >= $constraint->value) 
                {
                    $fired = true;
                }
            }
            else if ($constraint->type == "menor") 
            {
                if ($event->data->value < $constraint->value) 
                {
                    $fired = true;
                }
            }
            else if ($constraint->type == "menor igual") 
            {
                if ($event->data->value <= $constraint->value) 
                {
                    $fired = true;
                }
            }
            else if ($constraint->type == "igual") 
            {
                if ($event->data->value == $constraint->value) 
                {
                    $fired = true;
                }
            }
            
            if ($fired) 
            {
                $occurrence = ConstraintOccurrence::create([
                    "device_id" => $constraint->device_id,
                    "visualization_id" => $event->visualization->id,
                    "constraint_id" => $constraint->id,
                    "value" => $event->data->value
                ]);
                
            }
        }
        
    }
}
