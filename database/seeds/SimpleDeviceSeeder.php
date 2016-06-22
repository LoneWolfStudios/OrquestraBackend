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
        
        {
            $device = new Device;
            
            $device->nickname = "Valvula Aquecedora";
            $device->desc = "Dipositivo para testar infrestrutura do Orquestra";
            $device->user_id = $user->id;
            
            $device->save();
            
            $pinA = new Pin;
            
            $pinA->name = "Vazao";
            $pinA->desc = "Pino do sensor de vazao";
            
            $pinA->device_id = $device->id;
            
            $pinA->save();
            
            $pinB = new Pin;
            
            $pinB->name = "Temperatura";
            $pinB->desc = "Pino do sensor de temperatura";
            
            $pinB->device_id = $device->id;
            
            $pinB->save();
        }
        
        {
            $device = new Device;
            
            $device->nickname = "Regulador de Humidade";
            $device->desc = "Dipositivo para testar infrestrutura do Orquestra";
            $device->user_id = $user->id;
            
            $device->save();
            
            $pinA = new Pin;
            
            $pinA->name = "Luminosidade";
            $pinA->desc = "Pino de sensor LDR";
            
            $pinA->device_id = $device->id;
            
            $pinA->save();
            
            $pinB = new Pin;
            
            $pinB->name = "Humidade";
            $pinB->desc = "Pino do sensor de humidade relativa do ar";
            
            $pinB->device_id = $device->id;
            
            $pinB->save();
        }
    }
}
