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
                    <li class="li"><input type="checkbox" style="margin-right: 5px;" name="houses" disabled>Дома
                    </li>
                    <li class="li"><input type="checkbox" style="margin-right: 5px;" name="cottages" disabled>Коттеджи
                    </li>
                    <li class="li"><input type="checkbox" style="margin-right: 5px;" name="flats" disabled>Квартиры
                    </li>
                    <li class="li"><input type="checkbox" style="margin-right: 5px;" name="hostels" disabled>Хостелы
                    </li>
                    <li class="li"><input type="checkbox" style="margin-right: 5px;" name="rooms" disabled>Комнаты
                    </li>
                    <li class="li"><input type="checkbox" style="margin-right: 5px;" name="campings" disabled>Турбазы
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
                    <li class="li"><input type="checkbox" style="margin-right: 5px;" name="daily" disabled>Посуточно
                    </li>
                    <li class="li"><input type="checkbox" style="margin-right: 5px;" name="longtime" disabled>На
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
                <input type="range" class="custom-range" min="0" max="100" name="" disabled>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Min</label>
                        <input type="number" class="form-control" name="min-price" placeholder="0" disabled>
                    </div>
                    <div class="form-group text-right col-md-6">
                        <label>Max</label>
                        <input type="number" class="form-control" name="max-price" placeholder="100000" disabled>
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
                    <input type="radio" name="number_of_guests" value="1">
                    1
                </li>
                <li class="checkbox-btn">
                    <input type="radio" name="number_of_guests" value="2">
                    2
                </li>
                <li class="checkbox-btn">
                    <input type="radio" name="number_of_guests" value="3">
                    3
                </li>
                <li class="checkbox-btn">
                    <input type="radio" name="number_of_guests" value="-1">
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
