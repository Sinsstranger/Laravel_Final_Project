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
                        <li class="breadcrumb-item"><a href="/">Главная</a></li>
                        <li class="breadcrumb-item"><a href="index.blade.php">Каталог</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $property->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!--Блок с основным фото и описанием
    location, price
    description-->
    <section>
        <div class="container">
            <div class="content-object">
               <div class="content-object-left">
                   <img src="{{ asset("assets/images/work-1.jpg") }}" style="height:250px">
               </div>
                <div class="content-object-right">
                    <div>
                        <h5>Place, country </h5>
                        <h5 class="price">{{ $property->price_per_day }}₽</h5>
                    </div>
                    <p>{{ $property->description }}</p>
                </div>
            </div>
        </div>
    </section>
    <!--Блок подробности
    подробности
    Возможность временной регистрации (как делаем? Строка в описании + глаочка в форме бронирования нужна/нет?)-->
    <section>
        <div class="container">
            <div class="details-section">
                <p>Тип жилья</p>
                <p class="info">Квартира</p>
                <p>Количество комнат</p>
                <p class="info">Много</p>
                <p>Количество гостей</p>
                <p class="info">Ещё больше</p>
                <p>Срок аренды</p>
                <p class="info">Посуточно</p>
                <p>Временная регистрация</p>
                <p class="info">Возможна</p>
                <address>Адрес</address>
                <p class="info">Какой-то адрес</p>
                <p>Имя владельца</p>
                <p class="info">Какой-то Иван</p>
                <p>Телефон владельца</p>
                <p class="info">Какой-то номер</p>

            </div>
        </div>
    </section>
    <!--Локация (текст или карта?)
    Возможность временной регистрации (как делаем? Строка в описании + глаочка в форме бронирования нужна/нет?)-->
    <!--<section>
        <div class="container">
            <div class="heading-section">
                <h4>Карта</h4>
            </div>
        </div>
    </section>
    Фотографии
    Отдельным блоком или прикрутить вверху, где описание...-->
    <section>
        <div class="container">
            <div class="heading-section">
                <h4>Фотогалерея</h4>
            </div>
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset("assets/images/work-1.jpg") }}" class="d-block w-100" alt="Дом для аренды">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset("assets/images/work-2.jpg") }}" class="d-block w-100" alt="Дом для аренды">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset("assets/images/work-3.jpg") }}" class="d-block w-100" alt="Дом для аренды">
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
        </div>
    </section>
    <!--Форма бронирования
    Возможно, боковая
    Блок выбора дат
    Галочка о регистрации-->
    <section>
        <div class="container">
            <div class="heading-section">
                <h4>Форма бронирования</h4>
            </div>
        </div>
    </section>
    <!--Отзывы
    Форма добавления отзыва-->
    <section class="object-review">
        <div class="container">
            <div class="heading-section">
            <h4>Отзывы</h4>
                <hr>
                <!--Запустить через foreach-->
                <div class="comment-body">
                    <h5>Мессир Воланд</h5>
                    <!--<p>Рейтинг</p>-->
                    <p class="meta">4 ноября 2023</p>
                    <p>Теперь мне есть, где выпить чашечку кофе в спокойной обстановке.</p>
                </div>
                <hr>
                <div>
                    <div class="comment-body">
                        <h5>Имя пользователя</h5>
                        <!--<p>Рейтинг</p>-->
                        <p class="meta">Дата</p>
                        <p>Текст отзыва</p>
                    </div>
                <hr>
                <span class="subheading">Оставить отзыв</span>
            <form action="#" class="bg-light p-4 p-md-5 contact-form">
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
        </div>
    </section>
    <div>
    <p>Обявление с ID: {{ $property->id }}</p>
    <span>{{ $property->title }}</span>
</div>
@endsection

