<?php
/**
 * Правки:
 * 1. Добавлен возврат JSON-ответа в методах messages и send для более явной обработки ответов в клиентской части.
 * 2. Добавлены типы возвращаемых данных в методах.
 * 3. Добавлены комментарии для пояснения кода.
 * 4. Закомментирована строка auth()->loginUsingId(1) для симуляции залогиненного пользователя. Раскомментируйте ее, если нужно тестировать вход в систему.
 */
namespace App\Http\Controllers;

use App\Events\MessageSend;
use App\Http\Requests\MessageFormRequest;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class ChatController extends Controller
{
    public function index(): View
    {
        // auth()->loginUsingId(1); // Uncomment if you want to simulate a logged-in user
        return view('chat');
    }

    public function messages(): JsonResponse
    {
        $messages = Message::with('user')->get();

        return response()->json(['messages' => $messages]);
    }

    public function send(MessageFormRequest $request): JsonResponse
    {
        $message = $request->user()->messages()->create($request->validated());
        broadcast(new MessageSend($request->user(), $message));

        return response()->json(['message' => $message]);
    }
}
