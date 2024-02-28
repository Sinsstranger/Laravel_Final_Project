<?php
//Создать событие php artisan make:event DefineNewUserEvent
namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DefineNewUserEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public User $user; // чтобы можно было задействовать user нужно создать поле и передать его в конструкторе
    /**
     * Create a new event instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    //как задействовать этот класс? Логика происходит в Http/Controllers/Auth/RegisteredUserController.php 
    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
