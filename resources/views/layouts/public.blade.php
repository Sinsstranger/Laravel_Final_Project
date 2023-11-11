<!DOCTYPE html>
<html lang="ru">
<head>
    <title>@section('title')Сайт аренды недвижимости | @show</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    @section('style')@show
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<div class="py-1 bg-black top">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span>
                        </div>
                        <span class="text">+ 1 (234) 567-89-00</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text">info@yoursite.com</span>
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
                                                    <span
                                                        style="font-size:14px; font-weight: 500">Войти
                                                    </span>
                                        </a>

                                    @endif

                                    @if (Route::has('register'))

                                        <a class="mr-3" href="{{ route('register') }}"
                                           style="color: #FFFFFF">
                                            <span style="font-size:14px; font-weight: 500">Регистрация</span>
                                        </a>

                                    @endif

                                    @else

                                        @if(Auth::user()->avatar !== null)

                                            <img src="{{ Auth::user()->avatar }}" style="width:45px;">

                                        @endif
                                </li>
                                <li class="nav-item" style="display: flex">
                                    <a href="{{ route('dashboard') }}" class="mr-3 link-text"
                                       style="color: #FFFFFF">
                                        <span class="text"> {{ Auth::user()->name }} </span>
                                    </a>

                                    <div>

                                        <a class="mr-3" href="{{ route('logout') }}" style="color: #FFFFFF"
                                           onclick="event.preventDefault();
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
                                    <a class="mr-3" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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
     id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">"ЗОЛОТОЙ КЛЮЧИК"</a>
        <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
                data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Меню
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav nav ml-auto">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link"><span>ГЛАВНАЯ</span></a></li>
                <li class="nav-item"><a href="{{ route('properties') }}" class="nav-link"><span>КАТАЛОГ</span></a></li>
                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link"><span>О НАС</span></a></li>
                <li class="nav-item"><a href="{{ route('contacts') }}" class="nav-link"><span>КОНТАКТЫ</span></a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')
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
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Дома</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Квартиры</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Комнаты</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Коттеджи</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Турбазы</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Хостелы</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Что я хочу?</h2>
                    <ul class="list-unstyled">
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Найти помещение</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Сдать помещение</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Контакты</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">123456, Москва, Длинная
										аллея, д.78</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+ 1 (234)
											567-89-00</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope pr-4"></span><span
                                        class="text">info@yoursite.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>Copyright &copy;
                    <script>document.write(new Date().getFullYear());</script>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
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

<script src="{{ asset("assets/js/main.js") }}"></script>

</body>

</html>
