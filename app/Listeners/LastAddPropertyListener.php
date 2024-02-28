<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LastAddPropertyListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $id = $event->property->id;
        $eventModel = new \App\Models\Event();
        $eventModel->title = 'Добавлено новое объявление #' . $id;
        $eventModel->property_id = $id;
        //dd($event->property);
        $eventModel->save();
    }
}
