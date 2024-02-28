<?php

namespace App\Providers;

use App\Events\DefineNewPropertyEvent;
use App\Events\DefineNewUserEvent;
use App\Listeners\LastAddPropertyListener;
use App\Listeners\LastAddUserListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        DefineNewUserEvent::class => [ //связать событие DefineNewUserEvent со слушателем LastAddUserListener в провайдоре Providers/EventServiceProvider
            LastAddUserListener::class,
        ],
        DefineNewPropertyEvent::class => [
            LastAddPropertyListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
