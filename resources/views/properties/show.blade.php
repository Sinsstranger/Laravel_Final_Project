@extends('layouts.public')
@section('title')
    @parent{{ $property->title }}
@endsection
@section('style')
    @parent<link rel="stylesheet" href="{{ asset("assets/css/object.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/lightpick.css") }}">
@endsection
@section('content')
    <br>
    <br>
    <br>
    <!--Блок с заголовком страницы и хлебными крошками-->
    <section class="object-title">
        <div class="container">
            <div class="header-object">
                <h3>{{ $property->title }}</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../">Главная</a></li>
                        <li class="breadcrumb-item"><a href="../properties">Каталог</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $property->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!--Блок с основным фото и описанием
    location, price
    description-->
    <div class="object-content container">
        <section class="description-section container">
            <div class="description-content">
                <div class="description-content-left">
                    <img src="{{$property->photo}}" alt="main object photo">
                </div>
                <div class="description-content-right">
                    <div class="rent-location">
                        <h5>{{$property->address->country}},
                            {{$property->address->place}}</h5>
                        <div class="rent-price">
                            <h5 class="price"><span id="price-per-day">{{ $property->price_per_day }}</span>₽</h5>
                            @if($property->daily_rent)
                                <p>за сутки</p>
                            @else
                                <p>за 30 суток</p>
                            @endif
                        </div>
                    </div>
                    <p>{{ $property->description }}</p>
                </div>
            </div>
        </section>

        <!--Форма бронирования-->
        <aside class="rent-section">
            <div class="container">
                <div class="heading-section">
                    <h4>Хочу забронировать</h4></div>
                <form id="new-reservation" action="{{ route('user.deals.store') }}" method="post">
                    @csrf
                    <div>
                    <p>Укажите даты <label  for="datepicker">заезда и выезда</label></p>
                        @if($property->daily_rent)
                            <p class="condition">Время заезда и выезда — 9:00.</p>
                        @else
                            <p class="condition">Срок аренды - <b>от 30 суток</b></p>
                        @endif
                    <input type="text" name="rent_start_and_end" id="datepicker" placeholder="Выберите даты..." required class="form-control form-control-sm"/>
            </div>
                    <div>
                        <p><label for="guests">Количество гостей</label></p>
                        <input type="number" name="guests" id="guests" step="1" value="1" min="1" max="{{$property->number_of_guests}}" form="new-reservation" required>
                    </div>
                    <div>
                    @if($property->is_temporary_registration_possible)
                        <p class="rent-radio">Нужна временная регистрация</p>
                        <div class="form-check-rent">
                            <input class="form-check-input-rent" type="radio" name="temporary_reg" id="temporary_reg0" value="0" checked="" form="new-reservation">
                            <label class="form-check-label-rent" for="temporary_reg0">
                                Нет
                            </label>
                            <input class="form-check-input-rent" type="radio" name="temporary_reg" value="1" id="temporary_reg1" form="new-reservation">
                            <label class="form-check-label-rent" for="temporary_reg1">
                                Да
                            </label>
                        </div>
                    @else
                        <input class="form-check-input-rent" type="radio" name="temporary_reg" id="temporary_reg0" value="0" checked="" form="new-reservation" hidden>
                        <label class="form-check-label-rent" for="temporary_reg0" hidden>
                            Нет
                        </label>
                    @endif</div>
                    <div class="rent-summary">
                        <hr>
                        <p id="result2">&nbsp;</p>
                        @auth
                        <input type="hidden" name="tenant_id" value="{{ \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier() }}">
                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                        <input type="submit" value="Забронировать" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#reservation" form="new-reservation">
                        @endauth
                    </div>
                </form>

            </div>
            @guest
            <div class="deal-form-popup">
                <div class="deal-form-popup-content p-3">
                    <a href="{{ route('register') }}" class="btn btn-block btn-primary">Зарегистрируйтесь, чтобы забронировать</a>
                </div>
            </div>
            @endguest
        </aside>
        <!-- Modal-->
        <div class="modal fade" id="reservation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="reservationLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="reservationLabel">Готово!</h1>
                        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                    </div>
                    <div class="modal-body">
                        <p>Ваша заявка на бронирование <b>{{$property->title}} с <span id="result"> </span></b> оформлена. Ожидайте, пожалуйста, рассмотрения заявки владельцем помещения.</p>
                        <p>Статус заявки вы можете отслеживать в личном кабинете.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Всё понятно</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Блок подробности
        подробности
        Возможность временной регистрации (как делаем? Строка в описании + глаочка в форме бронирования нужна/нет?)-->
        <div class="object-content-details">
            <section class="details-section-1 container">

                <div class="details-content">
                    <p>Тип жилья</p>
                    <p class="info">{{$property->category->title}}</p>
                    <p>Количество комнат</p>
                    <p class="info">{{$property->number_of_rooms}}</p>
                    <p>Количество гостей</p>
                    <p class="info">{{$property->number_of_guests}}</p>
                    <p>Срок аренды</p>
                    @if($property->daily_rent)
                        <p class="info">Посуточная аренда</p>
                    @else
                        <p class="info">Долгосрочная аренда</p>
                    @endif
                    <p>Временная регистрация</p>
                    @if($property->is_temporary_registration_possible)
                        <p class="info">Возможна</p>
                    @else
                        <p class="info">Нет</p>
                    @endif
                    <address>Адрес</address>
                    <p class="info">
                        {{$property->address->country}},
                        {{$property->address->place}},
                        {{$property->address->street}},
                        {{$property->address->house_number}} -
                        {{$property->address->flat_number}}</p>
                    <p>Имя владельца</p>
                    <p class="info">{{$property->user->name}}</p>
                    <!--<p>Телефон владельца</p>
                    <p class="info">Какой-то номер</p>-->
                </div>
            </section>
            <!--Локация (текст или карта?)-->
            <!--<section>
                <div class="container">
                    <div class="heading-section">
                        <h4>Карта</h4>
                    </div>
                </div>
            </section>-->
            <!--Фотографии
            Отдельным блоком или прикрутить вверху, где описание...-->
            <section class="photo-section container">

                <!-- <div class="heading-section">
                   <h4>Фотогалерея</h4>
                </div>-->
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://loremflickr.com/600/450/furniture,interior?random1" class="d-block w-100" alt="Дом для аренды">
                        </div>
                        <div class="carousel-item">
                            <img src="https://loremflickr.com/600/450/furniture,interior?random2" class="d-block w-100" alt="Дом для аренды">
                        </div>
                        <div class="carousel-item">
                            <img src="https://loremflickr.com/600/450/furniture,interior?random3" class="d-block w-100" alt="Дом для аренды">
                        </div>
                        <div class="carousel-item">
                            <img src="https://loremflickr.com/600/450/furniture,interior?random4" class="d-block w-100" alt="Дом для аренды">
                        </div>
                        <div class="carousel-item">
                            <img src="https://loremflickr.com/600/450/furniture,interior?random5" class="d-block w-100" alt="Дом для аренды">
                        </div>
                        <div class="carousel-item">
                            <img src="https://loremflickr.com/600/450/furniture,interior?random6" class="d-block w-100" alt="Дом для аренды">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </section>

            <!--Отзывы
            Форма добавления отзыва-->
            <section class="review-section container">
                <div class="heading-section">
                    <h4>Отзывы</h4>
                    <hr>
                    <!--Запустить через foreach-->
                    <div class="review-body">
                        <h5>Мессир Воланд</h5>
                        <!--<p>Рейтинг</p>-->
                        <p class="date">4 ноября 2023</p>
                        <p>Теперь мне есть, где выпить чашечку кофе в спокойной обстановке.</p>
                    </div>
                    <hr>
                    <div class="review-body">
                        <h5>Имя пользователя</h5>
                        <!--<p>Рейтинг</p>-->
                        <p class="date">Дата</p>
                        <p>Текст отзыва</p>
                    </div>
                    <hr>
                    @auth
                    <span class="subheading"><label for="review">Оставить отзыв</label></span>
                    <form action="#" class="p-4 p-md-5 contact-form">
                        <!--По идее, нужно только поле для отзыва и доступ только для авторизованных пользователей-->
                        <!--
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ваше имя">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ваш Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Откуда Вы">
                        </div>
                        -->
                        <div class="form-group">
                            <textarea name="" id="review" cols="5" rows="5" class="form-control" placeholder="Ваш отзыв"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Отправить отзыв" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                    @endauth
                </div>
            </section>
        </div>
    </div>
    <!--<div>
    <p>Обявление с ID: {{ $property->id }}</p>
    <span>{{ $property->title }}</span>
    </div>-->
@endsection
@section('script')
    @parent <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="{{ asset("assets/js/lightpick.js") }}"></script>
    <script>
        const picker = new Lightpick({
            field: document.getElementById('datepicker'),
            singleDate: false,
            @if($property->daily_rent)
            minDays: 2,
            @else
            minDays: 31,
            numberOfMonths: 4,
            numberOfColumns: 2,
            @endif
            onSelect: function(start, end){
                let str = '';
                str += start ? start.format('DD.MM.YYYY') + ' по ' : '';
                str += end ? end.format('DD.MM.YYYY') : '...';
                document.getElementById('result').innerHTML = str;

                let ran = (end - start) / 86400000;
                let pr = document.getElementById('price-per-day').outerText;
                let res = ran * pr;

                @if ($property->daily_rent)
                    res = 'Стоимость аренды за весь срок: ' + res + '₽';
                @else
                    res = 'Стоимость аренды за весь срок: ' + Math.round(res/30) + '₽';
                @endif
                document.getElementById('result2').innerHTML = res;
                },
            })

    </script>

@endsection
