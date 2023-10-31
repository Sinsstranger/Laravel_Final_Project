@extends('layouts.public')
@section('content')
    <div class="py-1 bg-black top">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-phone2"></span>
                            </div>
                            <span class="text">+ 8 800 555 3535</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-paper-plane"></span></div>
                            <span class="text">example@email.com</span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
                            <p class="mb-0 register-link"><a href="{{ route('register') }}" class="mr-3">Регистрация</a><a
                                    href="{{route('login')}}">Войти</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target"
         id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="/">Аренда</a>
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
                    data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Меню
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">
                    <li class="nav-item"><a href="#home-section" class="nav-link"><span>Главная</span></a></li>
                    <li class="nav-item"><a href="#properties-section" class="nav-link"><span>Список</span></a></li>
                    <li class="nav-item"><a href="#about-section" class="nav-link"><span>О нас</span></a></li>
                    <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Контакты</span></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-wrap js-fullheight" style="background-image: url('assets/images/bg_2.jpg');"
             data-section="home"
             data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                 data-scrollax-parent="true">
                <div class="col-md-5 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                    <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Поможем Вам с
                        арендой недвижимости
                    </h1>
                    <p class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">У нас размещают
                        квартиры, дома, комнаты, помещения для бизнеса. Мы поможем Вам подобрать то, что Вам нужно.</p>
                    <form action="#" class="search-location">
                        <div class="row">
                            <div class="col-lg align-items-end">
                                <div class="form-group">
                                    <div class="form-field">
                                        <!-- Считаю, что здесь должна быть форма с фильтрами для подбора квартиры -->
                                        <input type="text" class="form-control" placeholder="Search location">
                                        <button><span class="ion-ios-search"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                            <div class="item">
                                <div class="properties ftco-animate">
                                    <div class="img">
                                        <img src="assets/images/work-1.jpg" class="img-fluid" alt="Colorlib Template">
                                    </div>
                                    <div class="desc">
                                        <div
                                            class="text bg-primary d-flex text-center align-items-center justify-content-center">
                                            <span>Sale</span>
                                        </div>
                                        <div class="d-flex pt-5">
                                            <div>
                                                <h3><a href="properties.html">{{ $prop->title }}</a></h3>
                                            </div>
                                            <div class="pl-md-4">
                                                <h4 class="price">{{ $prop->price_per_day}}</h4>
                                            </div>
                                        </div>
                                        <p class="h-info"><span class="location">New York</span> <span
                                                class="details">&mdash; 3bds,
											2bath</span></p>
                                    </div>
                                </div>
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
                    <p>Мы поможем Вам найти желаемое.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row no-gutters d-flex">
                <div class="col-md-6 col-lg-5 d-flex">
                    <div class="img d-flex align-self-stretch align-items-center"
                         style="background-image:url('assets/images/about.jpg');">
                    </div>
                </div>
                <div class="col-md-6 col-lg-7 px-lg-5 py-md-5">
                    <div class="py-md-5">
                        <div class="row justify-content-start pb-3">
                            <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
                                <h2 class="mb-4">Сервис аренды помещений "Золотой ключик"</h2>
                                <p>Мы работаем, чтобы Вы могли найти то, что ищите. Вам нужен дом на длительный срок? Мы
                                    подберем Вам различные варианты. Вы ищте квартиру на сутки-другие? У нас есть, что
                                    Вам предложить.</p>
                                <p>А, может быть, вам нужна просто комната? Подберем. Или, возможно, Вам нужны оффисные
                                    или производственные помещения? Вы обратились по адресу.</p>
                                <p>Если же Вы желаете сдать в аренду помещение, мы разместим Ваше объявление на нашей
                                    площадке.</p>
                                <p><a href="#" class="btn btn-primary py-3 px-4">Подобрать помещение</a> <a href="#"
                                                                                                            class="btn btn-secondary py-3 px-4">Сдать
                                        помещение</a></p>
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
                    <p>Для того, чтобы арендовать помещение, Вам необходимо пройти несложную процедуру
                        регитрации.</p>
                    <div class="media block-6 services text-center d-block pt-md-5 mt-md-5">
                        <div class="icon justify-content-center align-items-center d-flex"><span>1</span></div>
                        <div class="media-body p-md-3">
                            <h3 class="heading mb-3">Расскажите о своих пожеланиях</h3>
                            <p class="mb-5">Нажмите кнопку "Подобрать помещение" и в появившейся форме отметьте, что Вы
                                желаете найти и нажмите кнопку "Искать"</p>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-self-stretch ftco-animate mt-lg-5">
                    <div class="media block-6 services text-center d-block mt-lg-5 pt-md-5 pt-lg-4">
                        <div class="icon justify-content-center align-items-center d-flex"><span>2</span></div>
                        <div class="media-body p-md-3">
                            <h3 class="heading mb-3">Рассмотрите варианты</h3>
                            <p class="mb-5">Мы подберем из нашей базы данных подходящие варианты и предложим Вам на
                                рассмотрение.</p>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services text-center d-block">
                        <div class="icon justify-content-center align-items-center d-flex"><span>3</span></div>
                        <div class="media-body p-md-3">
                            <h3 class="heading mb-3">Свяжитесь с арендателем</h3>
                            <p class="mb-5">После того, как вы определитесь с наиболее подходящим вариантом, свяжитесь
                                по указанным контактом с арендатором и договоритесь о сделке</p>
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
                    <h2 class="mb-4">Вы желаете сдать в аренду Ваше помещение?</h2>
                    <p>Для того, чтобы внести помещение в нашу базу данных, Вы должны зарегестрироваться на саите и
                        заполнить форму, нажав на кнопку "Сдать помещение"</p>
                    <p class="mb-0"><a href="#" class="btn btn-white px-4 py-3">Сдать помещение</a></p>
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
                                    <span class="position">Artist</span>
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
                                    <span class="position">Artist</span>
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
                                    <span class="position">Artist</span>
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
                                    <span class="position">Artist</span>
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
                                    <span class="position">Artist</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Контакты</span>
                    <h2 class="mb-4">Свяжитесь с нами</h2>
                    <p>Если у вас возникли какие-либо вопросы или Вы хотите оставить отзыв</p>
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
                            <input type="text" class="form-control" placeholder="От куда Вы">
                        </div>
                        <div class="form-group">
							<textarea name="" id="" cols="30" rows="7" class="form-control"
                                      placeholder="Ваш отзыв"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Отправить отзыв" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>

                <div class="col-md-5 d-flex">
                    <div class="row d-flex contact-info mb-5">
                        <div class="col-md-12 ftco-animate">
                            <div class="box p-2 px-3 bg-light d-flex">
                                <div class="icon mr-3">
                                    <span class="icon-map-signs"></span>
                                </div>
                                <div>
                                    <h3 class="mb-3">Наш адрес</h3>
                                    <p>198 West 21th Street, Suite 721 New York NY 10016</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ftco-animate">
                            <div class="box p-2 px-3 bg-light d-flex">
                                <div class="icon mr-3">
                                    <span class="icon-phone2"></span>
                                </div>
                                <div>
                                    <h3 class="mb-3">Контактный телефон (круглосуточный)</h3>
                                    <p><a href="tel://1234567920">+ 1235 2355 98</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ftco-animate">
                            <div class="box p-2 px-3 bg-light d-flex">
                                <div class="icon mr-3">
                                    <span class="icon-paper-plane"></span>
                                </div>
                                <div>
                                    <h3 class="mb-3">Наш Email</h3>
                                    <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ftco-animate">
                            <div class="box p-2 px-3 bg-light d-flex">
                                <div class="icon mr-3">
                                    <span class="icon-globe"></span>
                                </div>
                                <div>
                                    <h3 class="mb-3">Вебсайт (Вы на нем)</h3>
                                    <p><a href="#">yoursite.com</a></p>
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

    <footer class="ftco-footer ftco-section">
        <div class="container-fluid px-md-5">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Stayhome</h2>
                        <p>Far far away, behind the word mountains, far from the countries.</p>
                        <ul class="ftco-footer-social list-unstyled mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Community</h2>
                        <ul class="list-unstyled">
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Search Properties</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>For Agents</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Reviews</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>FAQs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">About Us</h2>
                        <ul class="list-unstyled">
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Our Story</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Meet the team</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Careers</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Company</h2>
                        <ul class="list-unstyled">
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About Us</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Press</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Careers</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain
										View, San
										Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929
											210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope pr-4"></span><span
                                            class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This template
                        is made with
                        <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                                                                         target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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

@endsection
