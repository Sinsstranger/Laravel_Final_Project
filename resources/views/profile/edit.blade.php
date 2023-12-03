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
        @include('inc.message')
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

        <hr class="mt-0 mb-4">
        <div class="row">            

{{--            ФОРМА С АВАТАРОМ--}}
            <div class="col-xl-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Фото профиля</div>
                    <div class="card-body text-center">
                        <img src="{{ $user->avatar }}" alt="avatar" 
                        style="margin:0 auto;">                        
                        <div class="small font-italic text-muted mb-4">
                            JPG, JPEG или PNG не больше 5 MB
                        </div>                        
                    </div>
                </div>
            </div>

{{--            ФОРМА С ДАННЫМИ ПРОФИЛЯ--}}
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">Подробные данные</div>
                    <div class="card-body">

                        <form method="post"
                              enctype="multipart/form-data"
                              action="{{ route('profile.update', $user) }}">

                            @csrf
                            @method('PATCH')

                            <div class="mb-3">
                                <label class="small mb-1" for="name">
                                    Юзернейм (как ваше имя будет отображаться для других пользователей сайта)
                                </label>
                                <input name="name" style="border-radius: 10px;" id="name" type="text"
                                       placeholder="Введите свой ник" value = "{{$user->name ?? old('name')}}"
                                       class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="first_name">Имя</label>
                                    <input name="first_name" style="border-radius: 10px;" id="first_name"
                                           type="text" placeholder="Введите ваше имя"
                                           value="{{ $user->first_name ?? old('first_name')}}"
                                           class="form-control @error('first_name') is-invalid @enderror">
                                    @error('first_name')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="last_name">Фамимлия</label>
                                    <input name="last_name" style="border-radius: 10px;"
                                           id="last_name" type="text"
                                           placeholder="Введите вашу фамилию"
                                           value="{{ $user->last_name ?? old('last_name')}}"
                                           class="form-control @error('last_name') is-invalid @enderror">
                                    @error('last_name')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="email">Адрес электронной почты</label>
                                <input name="email" style="border-radius: 10px;" id="email"
                                       type="email"
                                       placeholder="Введите вашу почту" value="{{$user->email ?? old('email')}}"
                                       class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="phone">Номер телефона</label>
                                    <input name="phone" style="border-radius: 10px;" id="phone"
                                           type="tel"
                                           placeholder="+7 (900) 123-45-67" value="{{$user->phone ?? old('phone')}}"
                                           class="form-control @error('phone') is-invalid @enderror">
                                    @error('phone')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <br>
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="avatar">
                                        Изменить аватар (JPG, JPEG или PNG не больше 5 MB)</label>
                                    <input type="file" name="avatar" id="avatar">

                                </div>
                            </div>
                            <x-primary-button style="margin-top: 15px">Сохранить</x-primary-button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
        <br>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <br>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

        <br>

</x-app-layout>
