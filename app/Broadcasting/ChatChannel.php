<?php

namespace App\Broadcasting;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ChatChannel
{
    /**
     * Create a new channel instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     */
    public function join(User $user, string $chatId): bool
    {
        $message = Message::find($chatId);
        auth()->check();
        if ($user->id == $message->user_id_one || $user->id == $message->user_id_two) {
            return true;
        }
        return false;
    }
}
