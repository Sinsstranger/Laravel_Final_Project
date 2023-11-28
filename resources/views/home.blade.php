@extends('layouts.public')
@section('title')
@parent Главная страница
@endsection
@section('content')
<section class="hero-wrap js-fullheight" style="background-image: url('assets/images/bg_2.jpg');" data-section="home" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-5 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Поможем Вам с
                    арендой недвижимости
                </h1>
                <p class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">У нас размещают
                    квартиры, дома, комнаты, помещения для бизнеса. Мы поможем найти то, что Вам нужно.</p>
                <!-- <form action="#" class="search-location">
                    <div class="row">
                        <div class="col-lg align-items-end">
                            <div class="form-group">
                                <div class="form-field">
                                    <input type="text" class="form-control" placeholder="Найти недвижимость">
                                    <button><span class="ion-ios-search"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> -->
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-properties" id="properties-section">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Наши предложения</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-properties owl-carousel">
                    @foreach($allProperties as $prop)
                    @if($loop->iteration > 9)
                    @break
                    @endif
                    <div class="item">
                        <a href="{{ route('properties.show', $prop) }}">
                            <div class="properties ftco-animate">
                                <div class="img">
                                    <img src="assets/images/work-<?php echo (rand(1, 9)); ?>.jpg" class="img-fluid" alt="Дом для аренды">
                                </div>
                                <div class="desc">
                                    <div class="text bg-primary d-flex text-center align-items-center justify-content-center">
                                        <span>Хит</span>
                                    </div>
                                    <div class="d-flex pt-5">
                                        <div>
                                            <h3>{{ $prop->title }}</h3>
                                        </div>
                                        <div class="pl-md-4">
                                            <h4 class="price">{{ $prop->price_per_day}}₽</h4>
                                        </div>
                                    </div>
                                    <p class="h-info"><span class="location">{{$prop->address->country}}, {{$prop->address->place}}</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-intro img" id="about-section" style="background-image: url(assets/images/bg_1.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center">
                <h2>Найдите дом своей мечты</h2>
                <p>Мы знаем, как это сделать</p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row no-gutters d-flex">
            <div class="col-md-6 col-lg-5 d-flex">
                <div class="img d-flex align-self-stretch align-items-center" style="background-image:url('assets/images/about.jpg');">
                </div>
            </div>
            <div class="col-md-6 col-lg-7 px-lg-5 py-md-5">
                <div class="py-md-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
                            <h2 class="mb-4">Сервис аренды «Золотой ключик»</h2>
                            <p>Мы работаем, чтобы Вы могли найти то, что ищите. Вам нужен дом на длительный срок? Мы
                                подберем Вам различные варианты. Вы ищте квартиру на сутки-другие? У нас есть, что
                                Вам предложить.</p>
                            <p>А, может быть, вам нужна просто комната? Подберем. Вам нужны офисные
                                или производственные помещения? Вы обратились по адресу.</p>
                            <p>Если же Вы хотите сдать в аренду помещение, мы разместим Ваше объявление на нашей
                                площадке.</p>
                            <p><a href="{{ route('properties') }}" class="btn btn-primary py-3 px-4">Найти помещение</a> <a href="{{ route('user.properties.index') }}" class="btn btn-secondary py-3 px-4">Сдать помещение</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-services-2 bg-light" id="workflow-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 heading-section ftco-animate">
                <h2 class="mb-4">Как это работет</h2>
                <p>Для того, чтобы арендовать помещение, Вам необходимо пройти несложную процедуру регитрации.</p>
                <div class="media block-6 services text-center d-block pt-md-5 mt-md-5">
                    <div class="icon justify-content-center align-items-center d-flex"><span>1</span>
                    </div>
                    <div class="media-body p-md-3">
                        <h3 class="heading mb-3">Расскажите о своих пожеланиях</h3>
                        <p class="mb-5">Нажмите кнопку «Найти помещение» и в появившейся форме отметьте всё, что
                            имеет для вас значение, и нажмите кнопку «Искать»</p>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate mt-lg-5">
                <div class="media block-6 services text-center d-block mt-lg-5 pt-md-5 pt-lg-4">
                    <div class="icon justify-content-center align-items-center d-flex"><span>2</span></div>
                    <div class="media-body p-md-3">
                        <h3 class="heading mb-3">Рассмотрите варианты</h3>
                        <p class="mb-5">Мы подберем из нашего обширного катлога самые подходящие варианты и
                            предложим Вам на рассмотрение</p>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services text-center d-block">
                    <div class="icon justify-content-center align-items-center d-flex"><span>3</span></div>
                    <div class="media-body p-md-3">
                        <h3 class="heading mb-3">Свяжитесь с арендодателем</h3>
                        <p class="mb-5">После того, как вы определитесь с наиболее подходящим вариантом, свяжитесь
                            по указанным контактам с арендодателем и договоритесь о бронировании</p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-intro img" id="hotel-section" style="background-image: url(assets/images/bg_4.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-7">
                <h2 class="mb-4">Хотите сдать в аренду Ваше помещение?</h2>
                <p>Добавьте помещение в нашу базу: зарегестрируйтесь на сайте и
                    заполнить форму, нажав на кнопку «Сдать помещение»</p>
                <p class="mb-0"><a href="{{ route('dashboard') }}" class="btn btn-white px-4 py-3">Сдать помещение</a></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Остались вопросы?</span>
                <h2 class="mb-4">Свяжитесь с нами</h2>
            </div>
        </div>

        <div class="row block-9">
            <div class="col-md-7 order-md-last d-flex ftco-animate">
                <form action="#" class="bg-light p-4 p-md-5 contact-form">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ваше имя">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ваш Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Откуда Вы">
                    </div>
                    <div class="form-group">
                        <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Ваш вопрос"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Отправить сообщение" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>

            <div class="col-md-5 d-flex">
                <div class="row d-flex contact-info mb-5">
                    <div class="col-md-12 ftco-animate">
                        <div class="box p-2 px-3 bg-light">
                            <div class="icon mr-3">
                                <span class="icon-map-signs"></span>
                            </div>
                            <div>
                                <h3 class="mb-3">Наш адрес</h3>
                                <a href="https://yandex.ru/maps/?um=constructor%3A965a1c917eac0cd24588108d7fc8d4bb6c6c7958a94c2c041df7b1ab4d797ba1&source=constructorLink">Москва, пр. Мира, 26, этаж 1</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12 ftco-animate">
                        <div class="box p-2 px-3 bg-light">
                            <div class="icon mr-3">
                                <span class="icon-phone2"></span>
                            </div>
                            <div>
                                <h3 class="mb-3">Контактный телефон</h3>
                                <p><a href="tel:+1 (234) 567-89-00">Телефон + 1 (234) 567-89-00</a></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12 ftco-animate">
                        <div class="box p-2 px-3 bg-light">
                            <div class="icon mr-3">
                                <span class="icon-paper-plane"></span>
                            </div>
                            <div>
                                <h3 class="mb-3">Наш Email</h3>
                                <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12 ftco-animate">
                        <div class="box p-2 px-3 bg-light">
                            <div class="icon mr-3">
                                <span class="icon-globe"></span>
                            </div>
                            <div>
                                <h3 class="mb-3">Вебсайт</h3>
                                <p><a href="#">yoursite.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center pb-3">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                <span class="subheading">Прочитайте отзывы</span>
                <h2 class="mb-4">Что говорят наши клиенты</h2>
            </div>
        </div>
        <div class="row ftco-animate justify-content-center">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    <div class="item">
                        <div class="testimony-wrap text-center py-4 pb-5">
                            <div class="user-img" style="background-image: url(assets/images/person_1.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text px-4 pb-5">
                                <p class="mb-4">Теперь мне есть, где выпить чашечку кофе в спокойной обстановке.</p>
                                <p class="name">Мессир Воланд</p>
                                <span class="position">Москва</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap text-center py-4 pb-5">
                            <div class="user-img" style="background-image: url(assets/images/person_2.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text px-4 pb-5">
                                <p class="mb-4">Я все не могу нарадоваться на снятую здесь лубяную избушку</p>
                                <p class="name">Бедный Зайка</p>
                                <span class="position">Вологда</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap text-center py-4 pb-5">
                            <div class="user-img" style="background-image: url(assets/images/person_3.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text px-4 pb-5">
                                <p class="mb-4">Это просто фантастика! Я нашел своей собаке конуру мечты!</p>
                                <p class="name">Проф. Преображенский</p>
                                <span class="position">Москва</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap text-center py-4 pb-5">
                            <div class="user-img" style="background-image: url(assets/images/person_1.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text px-4 pb-5">
                                <p class="mb-4">Теперь мне есть, где выпить чашечку кофе в спокойной обстановке.</p>
                                <p class="name">Мессир Воланд</p>
                                <span class="position">Москва</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap text-center py-4 pb-5">
                            <div class="user-img" style="background-image: url(assets/images/person_3.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text px-4 pb-5">
                                <p class="mb-4">Это просто фантастика! Я нашел своей собаке конуру мечты!</p>
                                <p class="name">Проф. Преображенский</p>
                                <span class="position">Москва</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="map">
        <div id="map" class="bg-white"></div>
    </section> -->
@endsection
