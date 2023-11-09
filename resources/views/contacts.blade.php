@extends('layouts.public')
@section('title')
@parentКаталог недвижимости
@endsection
@section('style')
@parent
<link rel="stylesheet" href="{{ asset("assets/css/object.css") }}">
@endsection
@section('content')

<br><br><br>
<section class="object-title object-title-catalog">
    <div class="container">
        <div class="header-object">
            <h2 class="mb-4 list-real">Наши контакты</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Контакты</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="property-content">
    <div class="container">
        <main class="col-md-9">
            <header class="border-bottom mb-4 pb-3">
                <div class="form-inline">
                    <h4 class="mr-md-auto">Офис</h4>
                </div>
            </header>
            <div class="contact-content">
                <div class="contact-left">
                    <div class="form-inline">
                        <p class="mb-5">Москва, пр. Мира, 26, этаж 1</p>
                    </div>
                    <div class="form-inline"><a href="mailto:info@yoursite.com">Почта info@yoursite.com</a></div>
                    <div class="form-inline"><a href="tel:+1 (234) 567-89-00">Телефон + 1 (234) 567-89-00</a> </div>
                    <div class="form-inline">Часы работы Пн-Вс: 10:00 - 20:00</div>
                </div>
                <div class="y-map">
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A965a1c917eac0cd24588108d7fc8d4bb6c6c7958a94c2c041df7b1ab4d797ba1&amp;width=450&amp;height=450&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
            </div>

        </main>
    </div>
</section>
@endsection