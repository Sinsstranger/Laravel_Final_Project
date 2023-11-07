@extends('layouts.public')
@section('content')

<div class="container">
    <br><br><br>
    <div class="row justify-content-center mb-5 pb-3">
        <h2 class="mb-4 list-real">Список недвижимости</h2>
    </div>
    <div class="row">
        <aside class="col-md-3">
            <form class="card" action="#" method="GET">
                <div class="card-body">
                    <input type="text" class="form-control mb-2" placeholder="Поиск">
                    {{-- <div class="input-group-append"> --}}
                    <button class="btn btn-primary" type="button">
                        {{-- <img style="width: 10%" style="height: 10%" src="https://cdn-icons-png.flaticon.com/256/650/650154.png"> --}}
                        <img width="10%" height="10%" src="https://cdn-icons-png.flaticon.com/256/650/650154.png">
                    </button>
                    {{-- </div> --}}
                </div>
            </form>
            <form class="card">
                <article class="filter-group">
                    <header class="card-header">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Тип жилья</h6>
                    </header>
                    <div class="filter-content collapse show" id="collapse_1" style="">
                        <div class="card-body">
                            <ul class="list-menu">
                                <li class="li"><input type="checkbox" style="margin-right: 5px;" name="houses">Дома
                                </li>
                                <li class="li"><input type="checkbox" style="margin-right: 5px;" name="cottages">Коттеджи
                                </li>
                                <li class="li"><input type="checkbox" style="margin-right: 5px;" name="flats">Квартиры
                                </li>
                                <li class="li"><input type="checkbox" style="margin-right: 5px;" name="hostels">Хостелы
                                </li>
                                <li class="li"><input type="checkbox" style="margin-right: 5px;" name="rooms">Комнаты
                                </li>
                                <li class="li"><input type="checkbox" style="margin-right: 5px;" name="campings">Турбазы
                                </li>
                            </ul>
                        </div>
                    </div>
                </article>
                <article class="filter-group">
                    <header class="card-header">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Срок сдачи</h6>
                    </header>
                    <div class="filter-content collapse show" id="collapse_2">
                        <div class="card-body">
                            <ul class="list-menu">
                                <li class="li"><input type="checkbox" style="margin-right: 5px;" name="daily">Посуточно
                                </li>
                                <li class="li"><input type="checkbox" style="margin-right: 5px;" name="longtime">На
                                    длительный срок
                                </li>
                            </ul>
                            {{-- Код закомментил, чтоб сделать единообразно с предыдущим фильтром (по категории жилья)
                                Когда нибудь можно будет вернуться и к такому варианту --}}
                            {{-- <label class="custom-control custom-checkbox">
                                    <input type="checkbox" checked="" class="custom-control-input">
                                    <div class="custom-control-label">Сутки
                                        <b class="badge badge-pill badge-light float-right">120</b>
                                    </div>
                                </label>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" checked="" class="custom-control-input">
                                    <div class="custom-control-label">Длительно
                                        <b class="badge badge-pill badge-light float-right">15</b>
                                    </div>
                                </label> --}}
                        </div>
                    </div>
                </article>
                <article class="filter-group">
                    <header class="card-header">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Цена</h6>
                    </header>
                    <div class="filter-content collapse show" id="collapse_3" style="">
                        <div class="card-body">
                            <input type="range" class="custom-range" min="0" max="100" name="">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Min</label>
                                    <input type="number" class="form-control" name="min-price" placeholder="0">
                                </div>
                                <div class="form-group text-right col-md-6">
                                    <label>Max</label>
                                    <input type="number" class="form-control" name="max-price" placeholder="100000">
                                </div>
                            </div>
                            {{-- <button class="btn btn-block btn-primary">Применить</button> --}}
                        </div>
                    </div>
                </article>
                <article class="filter-group">
                    <header class="card-header">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Количество гостей</h6>
                    </header>
                    <div class="filter-content collapse show" id="collapse_4">
                        <ul class="list-menu">
                            <li class="checkbox-btn">
                                <input type="radio" name="guests" value="1">
                                1
                            </li>
                            <li class="checkbox-btn">
                                <input type="radio" name="guests" value="2">
                                2
                            </li>
                            <li class="checkbox-btn">
                                <input type="radio" name="guests" value="3">
                                3
                            </li>
                            <li class="checkbox-btn">
                                <input type="radio" name="guests" value="0">
                                Более
                            </li>
                        </ul>
                    </div>
                </article>
                <article class="filter-group">
                    <header class="card-header">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Другие фильтры </h6>
                    </header>
                </article>
                <div class="card-body">
                    <input type="submit" class="btn btn-block btn-primary" value="Применить">
                </div>
            </form>
        </aside>
        <main class="col-md-9">

            <header class="border-bottom mb-4 pb-3">
                <div class="form-inline">
                    <span class="mr-md-auto">найдено ? вариантов </span>
                    <select class="mr-2 form-control">
                        <option>Latest items</option>
                        <option>Trending</option>
                        <option>Most Popular</option>
                        <option>Cheapest</option>
                    </select>
                    <div class="btn-group">
                        <a href="#" class="btn btn-outline-secondary" data-toggle="tooltip" title="" data-original-title="List view">
                            <i class="fa fa-bars"></i></a>
                        <a href="#" class="btn  btn-outline-secondary active" data-toggle="tooltip" title="" data-original-title="Grid view">
                            <i class="fa fa-th"></i></a>
                    </div>
                </div>
            </header>
            {{--+ Васенин С.А. 2023-11-04--}}
            <div class="properties_grid">
                @forelse($properties as $property)
                <div>
                    <figure class="card card-product-grid">
                        <div class="img-wrap">
                            {{--<span class="badge badge-danger"> NEW </span> Добавить для новых объектов--}}
                            <img src="https://m.terem-pro.ru/upload/iblock/f50/f503b998a14db71227b0382f06b00c0a.jpg" class="img-fluid">
                            {{--<a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>--}}
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="{{route('properties.show', $property)}}" class="title">{{$property->title}}</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">{{$property->price_per_day}} руб.</span>
                                    <del class="price-old">{{$property->price_per_day}} руб.</del>
                                </div> <!-- price-wrap.// -->
                            </div>
                            <a href="{{route('properties.show', $property)}}" class="btn btn-block btn-primary">Перейти</a>
                        </figcaption>
                    </figure>
                </div>
                @empty
                Нет Объектов.
                @endforelse
            </div>
            {{$properties->links()}}
            {{--<nav class="mt-4" aria-label="Page navigation sample">
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#">Пред.</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">След.</a></li>
                    </ul>
                </nav>--}}
            {{--- Васенин С.А. 2023-11-04--}}
        </main>
    </div>
</div>
@endsection