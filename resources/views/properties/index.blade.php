@extends('layouts.public')
@section('content')

<div class="container">
    <br><br><br>
    <div class="row justify-content-center mb-5 pb-3">
        <h2 class="mb-4">Список недвижимости</h2>
    </div>
    <div class="row">
        <aside class="col-md-3">
            <form class="card" action="/search" method="GET">
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
                        {{-- </a> --}}
                    </header>
                    <div class="filter-content collapse show" id="collapse_1" style="">
                        <div class="card-body">
                            <ul class="list-menu">
                                <li class="li"><input type="checkbox" style="margin-right: 5px;">Дома</li>
                                <li class="li"><input type="checkbox" style="margin-right: 5px;">Коттеджи</li>
                                <li class="li"><input type="checkbox" style="margin-right: 5px;">Квартиры</li>
                                <li class="li"><input type="checkbox" style="margin-right: 5px;">Хостелы</li>
                                <li class="li"><input type="checkbox" style="margin-right: 5px;">Комнаты</li>
                                <li class="li"><input type="checkbox" style="margin-right: 5px;">Турбазы</li>
                            </ul>
                        </div>
                    </div>
                </article>
                <article class="filter-group">
                    <header class="card-header">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Время сдачи</h6>

                    </header>
                    <div class="filter-content collapse show" id="collapse_2">
                        <div class="card-body">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" checked="" class="custom-control-input">
                                <div class="custom-control-label">Сутки
                                    <b class="badge badge-pill badge-light float-right">120</b>
                                </div>
                            </label>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" checked="" class="custom-control-input">
                                <div class="custom-control-label">Неделя
                                    <b class="badge badge-pill badge-light float-right">15</b>
                                </div>
                            </label>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" checked="" class="custom-control-input">
                                <div class="custom-control-label">Другое
                                    <b class="badge badge-pill badge-light float-right">35</b>
                                </div>
                            </label>
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
                                    <input class="form-control" placeholder="$0" type="number">
                                </div>
                                <div class="form-group text-right col-md-6">
                                    <label>Max</label>
                                    <input class="form-control" placeholder="$1,0000" type="number">
                                </div>
                            </div>
                            {{-- <button class="btn btn-block btn-primary">Применить</button> --}}
                        </div>
                    </div>
                </article>
                <article class="filter-group">
                    <header class="card-header">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Количество человек</h6>
                    </header>
                    <div class="filter-content collapse show" id="collapse_4">
                        <ul class="list-menu">
                            <li class="checkbox-btn">
                                <input type="checkbox">
                                1
                            </li>
                            <li class="checkbox-btn">
                                <input type="checkbox">
                                2
                            </li>
                            <li class="checkbox-btn">
                                <input type="checkbox">
                                3
                            </li>
                            <li class="checkbox-btn">
                                <input type="checkbox">
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
                    <input type="submit" class="btn btn-block block-primary" value="apply">
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
                        <a href="#" class="btn btn-outline-secondary" data-toggle="tooltip" title=""
                            data-original-title="List view">
                            <i class="fa fa-bars"></i></a>
                        <a href="#" class="btn  btn-outline-secondary active" data-toggle="tooltip" title=""
                            data-original-title="Grid view">
                            <i class="fa fa-th"></i></a>
                    </div>
                </div>
            </header>

            <div class="row">
                <div class="col-md-4">
                    <figure class="card card-product-grid">
                        <div class="img-wrap">
                            <span class="badge badge-danger"> NEW </span>
                            <img src="https://m.terem-pro.ru/upload/iblock/f50/f503b998a14db71227b0382f06b00c0a.jpg"
                                class="img-fluid">
                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="#" class="title">Great item name goes here</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">$1280</span>
                                    <del class="price-old">$1980</del>
                                </div> <!-- price-wrap.// -->
                            </div>
                            <a href="#" class="btn btn-block btn-primary">Перейти</a>
                        </figcaption>
                    </figure>
                </div> <!-- col.// -->

                <div class="col-md-4">
                    <figure class="card card-product-grid">
                        <div class="img-wrap">
                            <img src="https://m.terem-pro.ru/upload/iblock/f50/f503b998a14db71227b0382f06b00c0a.jpg"
                                class="img-fluid">
                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="#" class="title">Product name goes here just for demo item</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">$1280</span>
                                </div> <!-- price-wrap.// -->
                            </div>
                            <a href="#" class="btn btn-block btn-primary">Перейти</a>
                        </figcaption>
                    </figure>
                </div> <!-- col.// -->

                <div class="col-md-4">
                    <figure class="card card-product-grid">
                        <div class="img-wrap">
                            <img src="https://m.terem-pro.ru/upload/iblock/f50/f503b998a14db71227b0382f06b00c0a.jpg"
                                class="img-fluid">
                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="#" class="title">Product name goes here just for demo item</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">$1280</span>
                                </div> <!-- price-wrap.// -->
                            </div>
                            <a href="#" class="btn btn-block btn-primary">Перейти</a>
                        </figcaption>
                    </figure>
                </div> <!-- col.// -->

                <div class="col-md-4">
                    <figure class="card card-product-grid">
                        <div class="img-wrap">
                            <img src="https://m.terem-pro.ru/upload/iblock/f50/f503b998a14db71227b0382f06b00c0a.jpg"
                                class="img-fluid">
                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="#" class="title">Product name goes here just for demo item</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">$1280</span>
                                </div> <!-- price-wrap.// -->
                            </div>
                            <a href="#" class="btn btn-block btn-primary">Перейти</a>
                        </figcaption>
                    </figure>
                </div> <!-- col.// -->

                <div class="col-md-4">
                    <figure class="card card-product-grid">
                        <div class="img-wrap">
                            <img src="https://m.terem-pro.ru/upload/iblock/f50/f503b998a14db71227b0382f06b00c0a.jpg"
                                class="img-fluid">
                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="#" class="title">Product name goes here just for demo item</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">$1280</span>
                                </div> <!-- price-wrap.// -->
                            </div>
                            <a href="#" class="btn btn-block btn-primary">Перейти</a>
                        </figcaption>
                    </figure>
                </div> <!-- col.// -->

                <div class="col-md-4">
                    <figure class="card card-product-grid">
                        <div class="img-wrap">
                            <img src="https://m.terem-pro.ru/upload/iblock/f50/f503b998a14db71227b0382f06b00c0a.jpg"
                                class="img-fluid">
                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="#" class="title">Product name goes here just for demo item</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">$1280</span>
                                </div> <!-- price-wrap.// -->
                            </div>
                            <a href="#" class="btn btn-block btn-primary">Перейти</a>
                        </figcaption>
                    </figure>
                </div> <!-- col.// -->

                <div class="col-md-4">
                    <figure class="card card-product-grid">
                        <div class="img-wrap">
                            <img src="https://m.terem-pro.ru/upload/iblock/f50/f503b998a14db71227b0382f06b00c0a.jpg"
                                class="img-fluid">
                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="#" class="title">Product name goes here just for demo item</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">$1280</span>
                                </div> <!-- price-wrap.// -->
                            </div>
                            <a href="#" class="btn btn-block btn-primary">Перейти</a>
                        </figcaption>
                    </figure>
                </div> <!-- col.// -->

                <div class="col-md-4">
                    <figure class="card card-product-grid">
                        <div class="img-wrap">
                            <img src="https://m.terem-pro.ru/upload/iblock/f50/f503b998a14db71227b0382f06b00c0a.jpg"
                                class="img-fluid">
                            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="#" class="title">Product name goes here just for demo item</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">$1280</span>
                                </div> <!-- price-wrap.// -->
                            </div>
                            <a href="#" class="btn btn-block btn-primary">Перейти</a>
                        </figcaption>
                    </figure>
                </div> <!-- col.// -->
            </div> <!-- row end.// -->


            <nav class="mt-4" aria-label="Page navigation sample">
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Пред.</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">След.</a></li>
                </ul>
            </nav>
        </main>
    </div>
</div>
@endsection
