<?php

namespace Orquestra\Listeners\User;

use Schema;
use Illuminate\Database\Schema\Blueprint;

use Orquestra\Events\User\DeviceWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class VisualizationDataTableCreation
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
     * @param  DeviceWasCreated  $event
     * @return void
     */
    public function handle(DeviceWasCreated $event)
    {
        $device = $event->device;
        
        Schema::create('visualization_data_' . $device->id, function (Blueprint $table) use ($event) {
            $table->increments('id');
            
            $table->unsignedInteger('visualization_id')->nullable(false);
            $table->unsignedInteger('device_id')->default($event->device->id);
            
            $table->double('value', 15, 8);
            
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }
}
