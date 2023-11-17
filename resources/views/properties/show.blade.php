@extends('layouts.public')
@section('title')
    @parent{{ $property->title }}
@endsection
@section('style')
    @parent<link rel="stylesheet" href="{{ asset("assets/css/object.css") }}">
    <script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.umd.min.js"></script>
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
                            <p class="condition">&nbsp;</p>
                        @else
                            <p class="condition">Срок аренды - <b>от 30 суток</b></p>
                        @endif
                    <input type="text" name="rent_start_and_end" id="datepicker" class="form-control form-control-sm" placeholder="Выберите даты..." form="new-reservation" required />
            </div>
                    <div>
                        <p><label for="guests">Количество гостей</label></p>
                        <input type="number" name="guests" id="guests" step="1" min="1" max="{{$property->number_of_guests}}" placeholder="0" form="new-reservation" required>
                    </div>
                    <div>
                    @if($property->is_temporary_registration_possible)
                        <p class="rent-radio">Нужна временная регистрация</p>
                        <div class="form-check-rent">
                            <input class="form-check-input-rent" type="radio" name="registration" id="temporary_reg0" value="0" checked="" form="new-reservation">
                            <label class="form-check-label-rent" for="temporary_reg0">
                                Нет
                            </label>
                            <input class="form-check-input-rent" type="radio" name="registration" value="1" id="temporary_reg1" form="new-reservation">
                            <label class="form-check-label-rent" for="temporary_reg1">
                                Да
                            </label>
                        </div>
                    @else
                        <input class="form-check-input-rent" type="radio" name="registration" id="temporary_reg0" value="0" checked="" form="new-reservation" hidden>
                        <label class="form-check-label-rent" for="temporary_reg0" hidden>
                            Нет
                        </label>
                    @endif</div>
                    <div class="rent-summary">
                        <hr>
                        <p id="result1">&nbsp;</p>
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

        <!--Блок подробности-->
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
            <!--Фотографии-->
            <section class="photo-section container">
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

            <!--Отзывыа-->
            <section class="review-section container">
                <div class="heading-section">
                    <h4>Отзывы</h4>
                    <hr>
                    <!--Запустить через foreach-->
                    <div class="review-body">
                        <h5>Violet Blue</h5>
                        <!--<p>Рейтинг</p>-->
                        <p class="date">15 июля 2023</p>
                        <p>Pellentesque vehicula lectus non elit consequat, tempor porta tortor condimentum. Mauris sagittis aliquet nulla, id pellentesque magna congue ut. In tristique orci a mollis semper. Morbi varius nibh in elit aliquam convallis at eget magna. Cras ex nunc, egestas ac ex ut, fermentum dignissim tortor. In lectus nibh, laoreet vitae fermentum ut, efficitur eu ligula. Praesent iaculis viverra ligula, vitae laoreet eros volutpat eu. Aliquam nec risus commodo, finibus nisl vel, pulvinar massa. Sed a erat dictum, luctus enim ac, iaculis enim.</p>
                    </div>
                    <hr>
                    <div class="review-body">
                        <h5>Gomer Sinpson</h5>
                        <!--<p>Рейтинг</p>-->
                        <p class="date">25 мая 2023</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas sollicitudin quam a commodo. Vestibulum non erat mi. Etiam molestie efficitur quam, nec eleifend risus pretium sed. Duis sodales orci id semper luctus. Pellentesque sit amet elit odio. Quisque viverra nunc ac sodales lobortis. Donec vehicula, ante vel ultricies blandit, nunc nulla auctor lectus, ut dictum ex urna id neque. Sed pretium metus non maximus scelerisque. Sed viverra, libero a luctus pulvinar, mauris purus volutpat orci, auctor iaculis massa nulla ut eros. Aliquam non lorem et eros sagittis auctor eu sit amet libero. Nulla consequat lectus quis auctor porttitor. Ut ut rhoncus justo. Nulla in sem sed ante imperdiet eleifend eget vitae mauris.</p>
                    </div>
                    <hr>
                    @auth
                    <span class="subheading"><label for="review">Оставить отзыв</label></span>
                    <form action="#" class="p-4 p-md-5 contact-form">

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
    <div>

    </div>
@endsection
@section('script')
    @parent
    <script>
        const DateTime = easepick.DateTime;
        books = [];
        bookedDates = [];
        @foreach($property->deal as $deal)
            startat = new Date("{{$deal->rent_starts_at}}");
            startat = startat.getFullYear() + "-" + (startat.getMonth() + 1).toString().padStart(2, "0") + "-" + startat.getDate().toString().padStart(2, "0");

            endat = new Date("{{$deal->rent_ends_at}}");
            endat = endat.getFullYear() + "-" + (endat.getMonth() + 1).toString().padStart(2, "0") + "-" + endat.getDate().toString().padStart(2, "0");
            booksmini = [startat,endat];
            //console.log(booksmini);
            books.push(booksmini);
            //console.log(books);
            bookedDates = books.map(d => {
                if (d instanceof Array) {
                    const startat = new DateTime(d[0], 'YYYY-MM-DD');
                    const endat = new DateTime(d[1], 'YYYY-MM-DD');

                    return [startat, endat];
                }
            });
        @endforeach
        //console.log(bookedDates);

        const picker = new easepick.create({
            element: document.getElementById('datepicker'),
            css: ['https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.css',],
            zIndex: 10,
            lang: "ru-RU",
            format: "YYYY-MM-DD",
            setup (picker) {
                picker.on('select', function (start, end) {
                start = picker.getStartDate();
                end = picker.getEndDate();
                    let str = "";
                      str += start ? start.format('DD.MM.YYYY') + ' по ' : '';
                       str += end ? end.format('DD.MM.YYYY') : '...';
                       str = 'Заявка на аренду {{$property->title}} с ' + str + '.'
                        document.getElementById('result1').innerHTML = str;

                    let ran = (end - start) / 86400000;
                    let pr = document.getElementById('price-per-day').outerText;
                    let res = ran * pr;

                    @if ($property->daily_rent)
                        res = 'Стоимость аренды за весь период: ' + res + '₽';
                    @else
                        res = 'Стоимость аренды за весь период: ' + Math.round(res/30) + '₽';
                    @endif
                    document.getElementById('result2').innerHTML = res;
                })
            },
            @if($property->daily_rent)
            calendars: 1,
            @else
            calendars: 2,
            @endif

            plugins: ["AmpPlugin",'RangePlugin', 'LockPlugin'],
            AmpPlugin: {
                dropdown: {
                    months: true,
                    years: true,
                    minYear: 2023,
                    maxYear: 2030
                },
                resetButton: true
            },
            RangePlugin: {
                tooltipNumber(num) {
                    return num - 1;
                },
                locale: {
                    one: 'сутки',
                    few: 'суток',
                    many: 'суток',
                    other: 'суток',
                },
                delimiter: " — "
            },
            LockPlugin: {
                minDate: new Date(),
                @if($property->daily_rent)
                minDays: 2,
                @else
                minDays: 31,
                @endif
                inseparable: true,
                filter(date, picked) {
                    if (picked.length === 1) {
                        const incl = date.isBefore(picked[0]) ? '[)' : '(]';
                        return !picked[0].isSame(date, 'day') && date.inArray(bookedDates, incl);
                    }
                    return date.inArray(bookedDates, '[)');
                },
            },
        });


        const form = document.getElementById('new-reservation');
        form.noValidate = true;

        form.addEventListener('submit', function(event) {
            if (!event.target.checkValidity()) {
                event.preventDefault();
                alert('Пожалуйста, заполните все пункты формы бронирования'); // error message
            }
        }, false);
    </script>
@endsection
