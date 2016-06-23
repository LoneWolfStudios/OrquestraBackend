<?php

namespace Orquestra\Listeners\User;

use Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Orquestra\Events\User\DeviceWasCreated;


class DeviceDataTableCreation implements ShouldQueue
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
     * @param  DeviceWasCreted  $event
     * @return void
     */
    public function handle(DeviceWasCreated $event)
    {
        $device = $event->device;
        
        Schema::create('device_data_' . $device->id, function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('pin_id')->nullable(false);
            $table->double('value', 15, 8);
            
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }
}
