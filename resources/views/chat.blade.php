<x-app-layout>
    @section('style')
    @parent
    <link rel="stylesheet" href="{{ asset("assets/css/cabinet.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/chat.css") }}">
    <script src="{{ asset("assets/js/chat.js") }}"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src='https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
    @endsection
        @if($chat->user_id_one === \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier()
         || $chat->user_id_two === \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())

        <div id="app">
            {{-- <div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-screen">
                <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
                    <div class="flex items-center space-x-4">
                        <div class="flex flex-col leading-tight">
                            <div class="text-2xl mt-1 flex items-center">
                                <span class="text-gray-700 mr-3">{{ auth()->user()->name }}</span>
                            </div>

                            <span class="text-lg text-gray-600">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                </div>

                <div  class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
                    <chat-messages :user="{{ auth()->user() }}"></chat-messages>
                </div>

                <div id="ChatForm" class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">

                    <chat-form ></chat-form>
                </div>
            </div> --}}

            <div class="container bootstrap snippets bootdey">
                <div class="tile tile-alt" id="messages-main">
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
                            <div class="pull-left hidden-xs">
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png"class="img-avatar m-r-10">
                                <span>Максим Максимов</span>
                            </div>

                            <ul class="ah-actions actions">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-trash"></i>
                                    </a>
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
                        <chat-messages :user="{{ auth()->user() }}" :chat="{{ $chat }}"></chat-messages>
                        <chat-form :chat="{{ $chat }}"></chat-form>
                    </div>
                </div>
            </div>
        </div>
    @else
        Доступ запрещен
        @endif
</x-app-layout>

