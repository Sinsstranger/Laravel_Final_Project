<!DOCTYPE html>
<html lang="ru">

<head>
    <title>@section('title')Сайт аренды недвижимости | @show</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset("assets/css/open-iconic-bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/animate.css") }}">

    <link rel="stylesheet" href="{{ asset("assets/css/owl.carousel.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/owl.theme.default.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/magnific-popup.css") }}">

    <link rel="stylesheet" href="{{ asset("assets/css/aos.css") }}">

    <link rel="stylesheet" href="{{ asset("assets/css/ionicons.min.css") }}">

    <link rel="stylesheet" href="{{ asset("assets/css/flaticon.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/icomoon.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/cabinet.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/feedbackForm.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/object.css") }}">
    @section('style')@show
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="py-1 bg-black top">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <a class="header-link" href="tel:+1 234 567-89-00">
                                <span class="icon-phone2"></span> + 1 234 567-89-00
                            </a>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <a class="header-link" href="mailto:info@yoursite.com">
                                <span class="icon-paper-plane"></span>info@yoursite.com</a>
                        </div>

                        <x-auth-nav></x-auth-nav>

                        {{--<div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    @if (Route::has('login'))

                                        <a class="mr-3" href="{{ route('login') }}"
                        style="color: #FFFFFF">
                        <span style="font-size:14px; font-weight: 500">Войти
                        </span>
                        </a>

                        @endif

                        @if (Route::has('register'))

                        <a class="mr-3" href="{{ route('register') }}" style="color: #FFFFFF">
                            <span style="font-size:14px; font-weight: 500">Регистрация</span>
                        </a>

                        @endif

                        @else

                        @if(Auth::user()->avatar !== null)

                        <img src="{{ Auth::user()->avatar }}" style="width:45px;">

                        @endif
                        </li>
                        <li class="nav-item" style="display: flex">
                            <a href="{{ route('dashboard') }}" class="mr-3 link-text" style="color: #FFFFFF">
                                <span class="text"> {{ Auth::user()->name }} </span>
                            </a>

                            <div>

                                <a class="mr-3" href="{{ route('logout') }}" style="color: #FFFFFF" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    <span style="font-size:14px; font-weight: 600">ВЫХОД</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                        </ul>
                        <p class="mb-0 register-link">
                            @auth()
                            @if(Auth::user())
                            <a href="{{ route('profile.edit') }}" class="mr-3">{{ Auth::user()->name }}</a>
                            <a class="mr-3" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            @else
                            <a href="{{ route('register') }}" class="mr-3">Регистрация</a>
                            <a href="{{ route('login') }}">Войти</a>
                            @endif
                            @endauth


                        </p>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target"
         id="ftco-navbar" style="z-index: 2">
{{--        При изменении z-index проверяйте не перекрывается ли выпадающее меню профиля!--}}
        <div class="container">
            <a class="navbar-brand" href="/">ЗОЛОТОЙ КЛЮЧИК</a>
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Меню
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link"><span>Главная</span></a></li>
                    <li class="nav-item"><a href="{{ route('properties') }}" class="nav-link"><span>Каталог</span></a></li>
                    <li class="nav-item"><a href="{{ route('about') }}" class="nav-link"><span>О нас</span></a></li>
                    <li class="nav-item"><a href="{{ route('contacts') }}" class="nav-link"><span>Контакты</span></a></li>
                    <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link"><span>Личный кабинет</span></a></li>
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')

    <!--Форма Вопрос по сайту-->
    <div id="myQue" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeQue()">&times;</a>
        <div class="overlay-content">
            <div class="connection-form">
                <h2>Есть вопрос?</h2>
                <form  method="post"
                       enctype="multipart/form-data"
                       action="{{ route('feedback.store') }}">
                    @csrf
                    @method('POST')

                    <p><label for="first_name">Представьтесь, пожалуйста</label></p>
                    <input type="text"
                           name="first_name"
                           class="form-control"
                           id="first_name"
                           placeholder="Ваше имя" required
                           value="{{ $feedback->first_name ?? old('first_name') }}">

                    <label for="last_name" hidden>Фамилия</label>
                    <input type="text"
                           name="last_name"
                           class="form-control"
                           id="last_name"
                           placeholder="Ваша фамилия" required
                           value="{{ $feedback->last_name ?? old('last_name') }}">

                    <label for="email" hidden>Ваш Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           id="email"
                           placeholder="Ваш Email" required
                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                           value="{{ $feedback->email ?? old('email') }}">

                    <label for="subject">Напишите, чем мы могли бы вам помочь? </label>
                    <textarea id="message" name="message" placeholder="Опишите ваши затруднения (не более 500 знаков)"
                              maxlength="500" required >{{ $feedback->message ?? old('message') }}</textarea>

                    <div>
                        <p><input type="checkbox" id="myCheck" onclick="checkContact()" style="margin-right: 5px;">Заказать обратный звонок
                        </p>

                        <div style="display:none" id="phone">
                            <label for="phone">Ваш номер телефона</label>
                            <input type="tel"
                                   name="phone"
                                   class="form-control"
                                   id="phone"
                                   placeholder="+7 (999) 123-45-67"
                                   data-phone-pattern
                                   value="{{ $feedback->phone ?? old('phone') }}">
                        </div>
                        <p id="textContact" style="display:none">Мы позвоним вам, как только прочитаем это
                            сообщение.</p>

                    </div>

                    <x-primary-button :type="'submit'" >Отправить
                    </x-primary-button>

                </form>
            </div>
        </div>
    </div>

    <div class="question" onclick="openQue()"><span class="tooltiptext">Есть вопросы?</span></div>

    <x-scroll-to-top-button></x-scroll-to-top-button>
    <footer class="ftco-footer ftco-section">
        <div class="container-fluid px-md-5">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Будьте как дома</h2>
                        <p>В любой стране, в любом городе, в любое время</p>
                        <ul class="ftco-footer-social list-unstyled mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Каталог помещений</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('properties') }}"><span class="icon-long-arrow-right mr-2"></span>Дома</a></li>
                            <li><a href="{{ route('properties') }}"><span class="icon-long-arrow-right mr-2"></span>Квартиры</a></li>
                            <li><a href="{{ route('properties') }}"><span class="icon-long-arrow-right mr-2"></span>Комнаты</a></li>
                            <li><a href="{{ route('properties') }}"><span class="icon-long-arrow-right mr-2"></span>Коттеджи</a></li>
                            <li><a href="{{ route('properties') }}"><span class="icon-long-arrow-right mr-2"></span>Турбазы</a></li>
                            <li><a href="{{ route('properties') }}"><span class="icon-long-arrow-right mr-2"></span>Хостелы</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Что я хочу?</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('properties') }}"><span class="icon-long-arrow-right mr-2"></span>Найти помещение</a></li>
                            <li><a href="{{ route('user.properties.index') }}"><span class="icon-long-arrow-right mr-2"></span>Сдать помещение</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Контакты</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><a href="https://yandex.ru/maps/?um=constructor%3A965a1c917eac0cd24588108d7fc8d4bb6c6c7958a94c2c041df7b1ab4d797ba1&source=constructorLink"><span class="icon icon-map-marker"></span>123456, Москва, пр. Мира, д. 26</a></li>
                                <li><a href="tel:+1 234 567-89-00"><span class="icon icon-phone"></span><span class="text">+ 1 234
                                            567-89-00</span></a></li>
                                <li><a href="mailto:info@yoursite.com"><span class="icon icon-envelope pr-4"></span><span class="text">info@yoursite.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>
    @section('script')@show
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset("assets/js/jquery.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery-migrate-3.0.1.min.js") }}"></script>
    <script src="{{ asset("assets/js/popper.min.js") }}"></script>
    <script src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.easing.1.3.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.waypoints.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.stellar.min.js") }}"></script>
    <script src="{{ asset("assets/js/owl.carousel.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.magnific-popup.min.js") }}"></script>
    <script src="{{ asset("assets/js/aos.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.animateNumber.min.js") }}"></script>
    <script src="{{ asset("assets/js/scrollax.min.js") }}"></script>
    <script src="{{ asset("assets/js/filter-form.js") }}"></script>
    <script src="{{ asset("assets/js/main.js") }}"></script>

    @stack('child-scripts')

</body>

</html>
