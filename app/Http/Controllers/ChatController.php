<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ChatController extends Controller
{


    public function getChat(Message $message): View
    {
        $chats = Message::query()->where('user_id_one',Auth::user()->getAuthIdentifier())
            ->orWhere('user_id_two', Auth::user()->getAuthIdentifier())->get();
        $users = [];
        foreach ($chats as $chatUser) {
            if ($chatUser->user_id_one !== Auth::user()->getAuthIdentifier()) {
                $users[] = User::find($chatUser->user_id_one);
            }
            if ($chatUser->user_id_two !== Auth::user()->getAuthIdentifier()) {
                $users[] = User::find($chatUser->user_id_two);
            }
        }
        return \view('chat', ['chat' => $message, 'usersChat' => $users]);
    }
    public function messages(Request $request): Collection|array
    {
        $chatId = $request->only('id');
        $chat = Message::find($chatId['id']);
        if (Auth::user()->getAuthIdentifier() === $chat->user_id_one || Auth::user()->getAuthIdentifier() === $chat->user_id_two)
        {
            return $chat->text;
        }
        return [['id' => Auth::user()->getAuthIdentifier(),
            'message' => 'Сообщения отсутствуют']];
    }
    public function create(User $user): RedirectResponse
    {

        $chats = Message::query()->where('user_id_one', Auth::user()->getAuthIdentifier())
            ->orWhere('user_id_two', Auth::user()->getAuthIdentifier())->get();

        if (count($chats)) {

            foreach ($chats as $chat) {
                if ($chat->user_id_one === $user->id) {
                    return redirect()->route('getChat', $chat->id);
                }
                if ($chat->user_id_two === $user->id) {
                    return redirect()->route('getChat', $chat->id);
                }
            }
        }

        $chat = Message::firstOrCreate([
                'user_id_one' => Auth::user()->getAuthIdentifier(),
                'user_id_two' => $user->id,
            ]);
        $chat->save();

        return redirect()->route('getChat', $chat->id);
    }

    public function send(Request $request)
    {
        $chat = Message::find($request->chat);
        $user = $request->user();
        if (Auth::user()->getAuthIdentifier() === $chat->user_id_one || Auth::user()->getAuthIdentifier() === $chat->user_id_two)
        {
            $message = $request->message;
            $text = [];
            if(!empty($chat->text)) {
                $newMessage = ['id' => Auth::user()->getAuthIdentifier(),
                    'message' => $message];
                foreach ($chat->text as $item) {
                    $text[] = $item;
                }
                $text[] = $newMessage;
            } else {
                $text[] = ['id' => Auth::user()->getAuthIdentifier(),
                    'message' => $message];
            }

            $chat->fill([
                'text' => $text
            ]);
            $chat->save();
            broadcast(new MessageSend($user,$chat, $request->message));
        }

        return $chat;
    }

}
