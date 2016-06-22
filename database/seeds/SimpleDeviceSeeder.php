<?php

use Illuminate\Database\Seeder;

use Orquestra\User;
use Orquestra\Device;
use Orquestra\Pin;

class SimpleDeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        
        $user->name = "Diego Rodrigues";
        $user->email = "diego.mrodrigues@outlook.com";
        $user->password = bcrypt("senha");
        
        $user->save();
        
        $device = new Device;
        
        $device->nickname = "Dispositivo Teste";
        $device->user_id = $user->id;
        
        $device->save();
        
        $pinA = new Pin;
        
        $pinA->name = "PinoA";
        
        $pinA->device_id = $device->id;
        
        $pinA->save();
        
        $pinB = new Pin;
        
        $pinB->name = "PinoB";
        
        $pinB->device_id = $device->id;
        
        $pinB->save();
    }
}
