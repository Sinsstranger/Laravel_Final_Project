<?php

namespace App\Events;

use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSend implements ShouldBroadcast

{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private User $user;
    private Message $chat;
    private string $message;
    /**
     * Create a new event instance.
     */
    public function __construct(User $user, Message $chat,string $message)
    {
        $this->user = $user;
        $this->chat = $chat;
        $this->message = $message;
    }

    public function broadcastWith(): array
    {
        return [
                 'id' => $this->user->id,
                'message' => $this->message
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('chats.'.$this->chat->id),
        ];
    }
}
