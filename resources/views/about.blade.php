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
            <h2 class="mb-4 list-real">О нас</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">О нас</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="property-content">
    <div class="container">
        <div class="row">
            <main class="col-md-9">
                <header class="border-bottom mb-4 pb-3">
                    <div class="form-inline">
                        <h4 class="mr-md-auto">Аренда недвижимости "Золотой ключик"</h4>
                    </div>
                </header>
                <p class="mb-5">Наша компания работает в сфере недвижимости,
                    сочетая ответственность, трудолюбие и доброжелательность для каждого клиента.
                    Мы обладаем базой жилья, где каждый сможет найти жилье в соответствии
                    со своим бюджетом. Мы постоянно развивается для того, чтобы создавать
                    максимально комфортную среду, как для клиентов, так и для сотрудников.</p>
            </main>
        </div>
    </div>
</section>
@endsection