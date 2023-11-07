@extends('layouts.public')
@section('title')
    @parent{{ $property->title }}
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
                   <img src="{{ asset("assets/images/work-6.jpg") }}">
               </div>
                <div class="description-content-right">
                    <div>
                        <h5>Place, country </h5>
                        <h5 class="price">{{ $property->price_per_day }}₽</h5>
                    </div>
                    <p>{{ $property->description }}</p>
                    <!--<div class="form-group">
                        <input type="submit" value="Забронировать" class="btn btn-primary py-3 px-5">
                    </div>-->
                </div>
            </div>

    </section>
        <!--Форма бронирования
    Возможно, боковая
    Блок выбора дат
    Галочка о регистрации-->
    <aside class="rent-section">
        <div class="container">
            <div class="heading-section">
                <h4>Хочу забронировать</h4></div>
                <form action="#">
                    <p>Укажите даты заезда и выезда</p>
                    <input type="date" name="calendar" value="{{ now() }}" min="{{ now() }}" required>

                    <input type="date" name="calendar" value="{{ now() }}" min="{{ now() }}" required>
                    <div>
                        <p>Количество гостей</p>
                        <input type="number" placeholder="1" min="1" step="1" value="1" required="">
                    </div>
                    @if($property->is_temporary_registration_possible)
                        <p class="rent-radio">Нужна временная регистрация</p>
                        <div class="form-check-rent">
                            <input class="form-check-input-rent" type="radio" name="temporary_reg" id="temporary_reg0" value="0" checked="">
                            <label class="form-check-label-rent" for="temporary_reg0">
                                Нет
                            </label>
                            <input class="form-check-input-rent" type="radio" name="temporary_reg" value="1" id="temporary_reg1">
                            <label class="form-check-label-rent" for="temporary_reg1">
                                Да
                            </label>
                        </div>
                    @else
                        <input class="form-check-input-rent" type="radio" name="temporary_reg" id="temporary_reg0" value="0" checked="" hidden>
                        <label class="form-check-label-rent" for="temporary_reg0" hidden>
                            Нет
                        </label>
                    @endif
                    <div>
                        <input type="submit" value="Забронировать" class="btn btn-white">
                    </div>
                </form>

        </div>
    </aside>
    <!--Блок подробности
    подробности
    Возможность временной регистрации (как делаем? Строка в описании + глаочка в форме бронирования нужна/нет?)-->
    <div class="smth-div">
        <section class="details-section container">

            <div class="details-content">
                <p>Тип жилья</p>
                <p class="info">Квартира</p>
                <p>Количество комнат</p>
                <p class="info">Много</p>
                <p>Количество гостей</p>
                <p class="info">Ещё больше</p>
                <p>Срок аренды</p>
                <p class="info">Посуточно</p>
                <p>Временная регистрация</p>
                @if($property->is_temporary_registration_possible)
                    <p class="info">Возможна</p>
                @else
                    <p class="info">Нет</p>
                @endif
                <address>Адрес</address>
                <p class="info">Какой-то адрес</p>
                <p>Имя владельца</p>
                <p class="info">Какой-то Иван</p>
                <p>Телефон владельца</p>
                <p class="info">Какой-то номер</p>

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
                        <img src="{{ asset("assets/images/work-4.jpg") }}" class="d-block w-100" alt="Дом для аренды">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset("assets/images/work-5.jpg") }}" class="d-block w-100" alt="Дом для аренды">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset("assets/images/work-7.jpg") }}" class="d-block w-100" alt="Дом для аренды">
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
                <span class="subheading">Оставить отзыв</span>
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
							<textarea name="" id="" cols="5" rows="5" class="form-control"
                                      placeholder="Ваш отзыв"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Отправить отзыв" class="btn btn-primary py-3 px-5">
                </div>
            </form>
        </div>

    </section></div></div>
    <div>
    <!--<p>Обявление с ID: {{ $property->id }}</p>
    <span>{{ $property->title }}</span>-->
</div>
@endsection

