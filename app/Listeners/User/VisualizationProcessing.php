<?php

namespace Orquestra\Listeners\User;

use DB;
use Event;

use Orquestra\Visualization;

use Orquestra\Events\User\PinDataWasInserted;
use Orquestra\Events\User\VisualizationWasProcessed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class VisualizationProcessing
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
     * @param  PinDataWasInserted  $event
     * @return void
     */
    public function handle(PinDataWasInserted $event)
    {
        $table = 'device_data_' . $event->device->id;
        
        $visualizations = Visualization::where('visualizations.active', true)
                                       ->where('device_id', $event->device->id)
                                       ->get();
        
        foreach ($visualizations as $visualization) 
        {
            $x = null; 
            $y = null; 
            $z = null;
            $id = null;
            
            foreach ($event->request->data as $pin) 
            {
                if ($visualization->x_id == $pin["pin_id"]) 
                {
                    $x = $pin["value"];
                }
                
                if ($visualization->y_id == $pin["pin_id"]) 
                {
                    $y = $pin["value"];
                }
                
                if ($visualization->z_id == $pin["pin_id"]) 
                {
                    $z = $pin["value"];
                }
            }
            
            if (is_null($visualization->y_id) && is_null($visualization->z_id) && !is_null($x)) 
            {
                $id = DB::table('visualization_data_' . $event->device->id)->insertGetId(
                    [
                        "visualization_id" => $visualization->id,
                        "device_id" => $event->device->id,
                        "value" => DB::raw(
                            str_replace("x", $x, 
                                $visualization->formula)
                        ),
                        "created_at" => DB::raw("CURRENT_TIMESTAMP"),
                        "updated_at" => DB::raw("CURRENT_TIMESTAMP")
                    ]
                );
            }
            
            if (is_null($visualization->z_id) && !is_null($x) && !is_null($y)) 
            {
                $id = DB::table('visualization_data_' . $event->device->id)->insert(
                    [
                        "visualization_id" => $visualization->id,
                        "device_id" => $event->device->id,
                        "value" => DB::raw(
                            str_replace("y", $y,    
                            str_replace("x", $x, 
                                $visualization->formula))
                        ),
                        "created_at" => DB::raw("CURRENT_TIMESTAMP"),
                        "updated_at" => DB::raw("CURRENT_TIMESTAMP")
                    ]
                );
            }
            
            if (!is_null($x) && !is_null($y) && !is_null($z)) 
            {
                $id = DB::table('visualization_data_' . $event->device->id)->insert(
                    [
                        "visualization_id" => $visualization->id,
                        "device_id" => $event->device->id,
                        "value" => DB::raw(
                            str_replace("z", $z,    
                            str_replace("y", $y,    
                            str_replace("x", $x, 
                                $visualization->formula)))
                        ),
                        "created_at" => DB::raw("CURRENT_TIMESTAMP"),
                        "updated_at" => DB::raw("CURRENT_TIMESTAMP")
                    ]
                );
            }
            
            if (!is_null($id)) 
            {
                $data = DB::table('visualization_data_' . $event->device->id)->find($id);
                
                Event::fire(new VisualizationWasProcessed($visualization, $data));
            }
            
        }
    }
}
