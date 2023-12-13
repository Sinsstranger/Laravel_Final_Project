@extends('layouts/app')
@section('style')
    @parent
    <link rel="stylesheet" href="{{ asset("assets/css/cabinet.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/chat.css") }}">
    <script src="{{ asset("assets/js/chat.js") }}"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src='https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
@endsection

@section('content')
        @if($message->user_id_one === \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier()
         || $message->user_id_two === \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())
{{--        @dump($user)--}}
            <div class="py-12" id="app">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                <div class="flex justify-between items-center gap-4">
                    <h1 class="text-lg font-medium text-gray-900 uppercase">Мои сообщения</h1>
                </div>

                <div class="tile tile-alt bg-white shadow sm:rounded-lg" id="messages-main">
                    <div class="ms-menu">
                        <div class="ms-user clearfix">
                            <img class="img_main" src="{{ auth()->user()->avatar }}">
                            <div class="user_field">
                                <h1 class="h1_user_field">{{ auth()->user()->first_name }}</h1>
                                <br>
                                <h1 class="h1_user_field">{{ auth()->user()->email }}</h1>
                            </div>
                        </div>

                        <div class="p-15">
                            <div class="dropdown">
                                <a class="btn btn-primary btn-block" href="#" data-toggle="dropdown">Сообщения<i class="caret m-l-5"></i></a>
                            </div>
                        </div>

                        <div class="list-group lg-alt">
                            @forelse($usersChat as $user)
                            <a class="list-group-item media" href="{{ route('chat.create', $user) }}">
                                <div class="pull-left">
                                    <img src="{{ $user->avatar }}" alt="" class="img-avatar">
                                </div>
                                <div class="media-body">
                                    <small class="list-group-item-heading" style="font-weight: bold; padding-left: 15px;">
                                        {{ $user->first_name . ' ' . $user->last_name }}</small>
                                    <br>
                                </div>
                            </a>
                            @empty
                                У Вас нет чатов
                            @endforelse
                        </div>
                    </div>

                    <div class="ms-body">
                        <div class="action-header clearfix">
                            <div class="pull-left hidden-xs chat-name">
                                <img src="{{ $recipient->avatar }}" class="img-avatar m-r-10">
                                <p>{{ $recipient->first_name }} {{ $recipient->last_name }}</p>
                            </div>

                            <ul class="ah-actions actions">
                                <li>
                                    <form method="post" action="{{ route('chat.destroy', $message) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="fa fa-trash"></i></button>

                                    </form>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-check"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-clock-o"></i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-sort"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="#">Latest</a>
                                        </li>
                                        <li>
                                            <a href="">Oldest</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-bars"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="#">Refresh</a>
                                        </li>
                                        <li>
                                            <a href="">Message Settings</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                            <div class="chat_body">
                                <chat-messages :user="{{ auth()->user() }}" :chat="{{ $message }}"></chat-messages>
                            </div>

                        <chat-form :chat="{{ $message }}"></chat-form>
                    </div>
                </div>
            </div>
        </div>
<script>

    const observer = new MutationObserver(function (mutations) {
        mutations.forEach(() => {
            const element = document.querySelector('.chat_body');
            element.scrollTop = element.scrollHeight;
        });
    });

    observer.observe(document.documentElement, {
        childList: true,
        subtree: true
    });

   </script>
    @else
        Доступ запрещен
        @endif
@endsection

