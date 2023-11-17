<x-app-layout>
    @section('style')
    @parent
    <link rel="stylesheet" href="{{ asset("assets/css/cabinet.css") }}">
    @endsection
    {{--<x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Мои объявления') }}
    </h2>
    </x-slot>--}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex">
                <div class="avatar-block">
                    <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill="#000000" d="M628.736 528.896A416 416 0 0 1 928 928H96a415.872 415.872 0 0 1 299.264-399.104L512 704l116.736-175.104zM720 304a208 208 0 1 1-416 0 208 208 0 0 1 416 0z"></path>
                        </g>
                    </svg>
                </div>
                <ul class="max-w-xl">
                    <li class="dashboard-link">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{$user->name}}
                        </h2>
                    </li>
                    <li class="dashboard-link">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{$user->email}}
                        </h2>

                    </li>
                    <li class="dashboard-link">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{$user->phone}}
                        </h2>

                    </li>
                </ul>
            </div>
        </div>
    </div> --}}

    <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4">
        <div artisan cache:clearv class="row">
            <div class="col-xl-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Фото профиля</div>
                    <div class="card-body text-center">
                        <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <div class="small font-italic text-muted mb-4">JPG или PNG не больше 5 MB</div>
                        <button class="btn btn-primary" type="button">Загрузить фото</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">Подробные данные</div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Юзернейм (как ваше имя будет отображаться для других пользователей сайта)</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="Введите свой ник" value="{{$user->name}}">
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Имя</label>
                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Введите ваше имя" value="Valerie">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Фамимлия</label>
                                    <input class="form-control" id="inputLastName" type="text" placeholder="Введите вашу фамилию" value="Luna">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Почта</label>
                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Введите вашу почту" value="{{$user->email}}">
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Номер телефона</label>
                                    <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="{{$user->phone}}">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="button">Сохранить изменения</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
