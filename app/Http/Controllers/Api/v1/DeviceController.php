<?php

namespace Orquestra\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use Orquestra\Device;
use Orquestra\Http\Requests;
use Orquestra\Http\Controllers\Api\ApiController;

class DeviceController extends ApiController
{
    
    public function byUser($id) 
    {
        return Device::where('user_id', $id)
                     ->where('active', true)
                     ->get();
    }
    
}
