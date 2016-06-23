<?php

namespace Orquestra\Http\Controllers\Api\v1;

use Event;

use Illuminate\Http\Request;

use Orquestra\Device;

use Orquestra\Events\User\DeviceWasCreated;

use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Api\ApiController;

class DeviceController extends ApiController
{
    
    public function find($id) 
    {
        return Device::find($id);
    }
    
    public function byUser($id) 
    {
        return Device::where('user_id', $id)
                     ->where('active', true)
                     ->get();
    }
    
    public function create(Request $request) 
    {
        $device = Device::create($request->all());
        
        Event::fire(new DeviceWasCreated($device));
        
        return $device;
    }
    
}
