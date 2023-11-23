{{-- <x-app-layout>
    @section('style')
        @parent<link rel="stylesheet" href="{{ asset("assets/css/cabinet.css") }}">
    @endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
            Личные данные
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<x-app-layout>
    @section('style')
    @parent
    <link rel="stylesheet" href="{{ asset("assets/css/cabinet.css") }}">
    @endsection

    <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Фото профиля</div>
                    <div class="card-body text-center">
{{--                        <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">--}}
                        <img src="{{ $user->avatar }}" alt="avatar">
                        <div class="small font-italic text-muted mb-4">JPG или PNG не больше 5 MB</div>
                        <input type="file">
                        <button class="btn btn-primary" style="margin-top: 15px;" type="button" type="file">Сохранить</button><br>
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
                                <input class="form-control" style="border-radius: 10px;" id="inputUsername" type="text" placeholder="Введите свой ник" value="{{$user->name}}">
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Имя</label>
                                    <input class="form-control" style="border-radius: 10px;" id="inputFirstName" type="text" placeholder="Введите ваше имя" value="Иван">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Фамимлия</label>
                                    <input class="form-control"  style="border-radius: 10px;"id="inputLastName" type="text" placeholder="Введите вашу фамилию" value="Иванов">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Почта</label>
                                <input class="form-control"  style="border-radius: 10px;"id="inputEmailAddress" type="email" placeholder="Введите вашу почту" value="{{$user->email}}">
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Номер телефона</label>
                                    <input class="form-control"  style="border-radius: 10px;" id="inputPhone" type="tel" placeholder="Введите ваш номер телефона" value="{{$user->phone}}"><br> @include('profile.partials.update-password-form')
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </div>

</x-app-layout>
