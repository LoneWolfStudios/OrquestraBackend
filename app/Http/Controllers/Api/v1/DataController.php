<?php

namespace Orquestra\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use Orquestra\PinData;
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
        
        return 1;
    }
    
}
