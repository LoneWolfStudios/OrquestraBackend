<?php

namespace Orquestra\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Orquestra\Events\User\DeviceWasCreated' => [
            'Orquestra\Listeners\User\DeviceDataTableCreation',
            'Orquestra\Listeners\User\VisualizationDataTableCreation',
        ],
        
        'Orquestra\Events\User\PinDataWasInserted' => [
            'Orquestra\Listeners\User\VisualizationProcessing',
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
