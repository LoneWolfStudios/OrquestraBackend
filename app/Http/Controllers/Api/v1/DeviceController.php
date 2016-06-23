<?php

namespace Orquestra\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Schema;
use Illuminate\Database\Schema\Blueprint;

use Orquestra\Device;
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
        
        // TODO: Serviço para prover id's únicas
        $device->unique_id = str_random(25);
        
        Schema::create($device->unique_id . '_pindata', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('pin_id')->nullable(false);
            $table->double('value', 15, 8);
            
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
        
        $device->save();
        
        return $device;
    }
    
}
