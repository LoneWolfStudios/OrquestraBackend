<?php

namespace Orquestra\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use DB;
use Event;

use Orquestra\Events\User\PinDataWasInserted;

use Orquestra\PinData;
use Orquestra\Visualization;
use Orquestra\Device;
use Orquestra\Pin;

use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Controller;

class DataController extends Controller
{
    
    public function send(Request $request) 
    {
        $device = Device::find($request->device_id);
        
        foreach ($request->data as $key => $value) 
        {
            $pd = new PinData("device_data_" . $device->id);
            
            $pd->pin_id = $value["pin_id"];
            $pd->value = $value["value"];
            
            $pd->save();
        }

        Event::fire(new PinDataWasInserted($device, $request));
    }
    
}
