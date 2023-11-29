<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;
use App\Http\Requests\MessageFormRequest;
use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChatController extends Controller
{
    public function index(): View
    {
//        auth()->loginUsingId(1);
        return \view('chat');
    }

    public function messages(): Collection|array
    {
        return Message::query()
            ->with('user')
            ->get();
    }

    public function send(MessageFormRequest $request)
    {
        $message = $request->user()
            ->messages()
            ->create($request->validated());
        broadcast(new MessageSend($request->user(), $message));

        return $message;
    }
}
