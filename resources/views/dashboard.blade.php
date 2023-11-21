<x-app-layout>
    @section('style')
    @parent
    <link rel="stylesheet" href="{{ asset("assets/css/cabinet.css") }}">
    @endsection
  {{-- старый дизайн профиля, при необходимости можно вернуть --}}

    {{-- <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4">
        <div artisan cache:clearv class="row">
            <div class="col-xl-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Фото профиля</div>
                    <div class="card-body text-center">
                        <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <button class="btn btn-primary" style="margin-top: 15px;" type="button"><a href="{{ route('profile.edit') }}">Изменить фото</a></button>
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
                                <input class="form-control" style="border-radius: 10px;" id="inputUsername" type="text" placeholder="Введите свой ник" value="{{$user->name}}" readonly>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Имя</label>
                                    <input class="form-control" style="border-radius: 10px;" id="inputFirstName" type="text" placeholder="Введите ваше имя" value="Иван" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Фамимлия</label>
                                    <input class="form-control"  style="border-radius: 10px;"id="inputLastName" type="text" placeholder="Введите вашу фамилию" value="Иванов" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Почта</label>
                                <input class="form-control"  style="border-radius: 10px;"id="inputEmailAddress" type="email" placeholder="Введите вашу почту" value="{{$user->email}}" readonly>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Номер телефона</label>
                                    <input class="form-control"  style="border-radius: 10px;"id="inputPhone" type="tel" placeholder="Введите ваш номер телефона" value="{{$user->phone}}" readonly>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="button"><a href="{{ route('profile.edit') }}">Изменить данные</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    
    <div class="container">
        <div class="main-body">
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                          <h4>Иван Иванов</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div style="margin-bottom: 10px; margin-top:10px" class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Юзернейм</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->name}}
                            </div>
                        </div>
                      <hr style="border: 2px solid black;">
                      <div style="margin-bottom: 10px; margin-top:10px" class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Имя</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                
                            </div>
                        </div>
                      <hr style="border: 2px solid black;">
                      <div style="margin-bottom: 10px; margin-top:10px" class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Фамилия</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                
                            </div>
                        </div>
                      <hr style="border: 2px solid black;">
                      <div style="margin-bottom: 10px; margin-top:10px" class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Почта</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$user->email}}
                        </div>
                      </div>
                      <hr style="border: 2px solid black;">
                      <div style="margin-bottom: 10px; margin-top:10px" class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Телефон</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$user->phone}}
                        </div>
                      </div>
                      <hr style="border: 2px solid black;">
                      <div style="margin-bottom: 10px; margin-top:10px" class="row">
                        <div class="col-sm-12">
                          <a class="btn btn-info" href="{{ route('profile.edit') }}">Изменить</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

</x-app-layout>
