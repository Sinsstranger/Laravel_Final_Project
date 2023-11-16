<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LastAddUserListener
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
        $id = $event->user->id;
        $eventModel = new \App\Models\Event();
        $eventModel->title = 'Зарегистрирован новый пользователь #' . $id;
        $eventModel->user_id = $id;
        $eventModel->save();
        //dd($event->user);
    }
}
