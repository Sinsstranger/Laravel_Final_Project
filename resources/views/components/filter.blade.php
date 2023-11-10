<form class="card" action="#" method="GET">
    <div class="card-body">
        <input type="text" class="form-control mb-2" placeholder="Поиск">
        {{-- <div class="input-group-append"> --}}
            <button class="btn btn-primary" type="button">
                {{-- <img style="width: 10%" style="height: 10%"
                    src="https://cdn-icons-png.flaticon.com/256/650/650154.png"> --}}
                <img width="10%" height="10%" src="https://cdn-icons-png.flaticon.com/256/650/650154.png">
            </button>
            {{--
        </div> --}}
    </div>
</form>
<form class="card" name="filter">
    <!-- Срок аренды -->
    <article class="filter-group">
        <header class="card-header">
            <i class="icon-control fa fa-chevron-down"></i>
            <h6 class="title">Срок аренды</h6>
        </header>
        <div class="filter-content collapse show pt-3 pr-3" id="collapse_2">
            <ul class="list-menu">
                <li class="li"><input type="radio" style="margin-right: 5px;" name="daily" value="true">Посуточно</li>
                <li class="li"><input type="radio" style="margin-right: 5px;" name="daily" value="false">На длительный срок</li>
                <li class="li"><input type="radio" style="margin-right: 5px;" name="daily" value="any">Любой</li>
            </ul>
        </div>
    </article>
    <!-- Тип недвижимости -->
    <article class="filter-group">
        <header class="card-header">
            <i class="icon-control fa fa-chevron-down"></i>
            <h6 class="title">Тип жилья</h6>
        </header>
        <div class="filter-content collapse show pt-3 pr-3" id="collapse_1" style="">
            <ul class="list-menu">
                <li class="li"><input type="checkbox" style="margin-right: 5px;" name="category" value="1">Квартира</li>
                <li class="li"><input type="checkbox" style="margin-right: 5px;" name="category" value="2">Дом</li>
                <li class="li"><input type="checkbox" style="margin-right: 5px;" name="category" value="3">Коттедж</li>
                <li class="li"><input type="checkbox" style="margin-right: 5px;" name="category" value="4">Комната</li>
                <li class="li"><input type="checkbox" style="margin-right: 5px;" name="category" value="5">Гостиница
                </li>
                <li class="li"><input type="checkbox" style="margin-right: 5px;" name="category" value="6">Кемпинг</li>
                <li class="li"><input type="checkbox" style="margin-right: 5px;" name="category" value="7">База отдыха
                </li>
                <li class="li"><input type="checkbox" style="margin-right: 5px;" name="category" value="8">Хостел</li>
            </ul>
        </div>
    </article>
    <!-- Количество комнат -->
    <article class="filter-group">
        <header class="card-header">
            <i class="icon-control fa fa-chevron-down"></i>
            <h6 class="title">Количество комнат</h6>
        </header>
        <div class="filter-content collapse show pt-3 pr-3" id="collapse_4">
            <ul class="list-menu">
                <li class="checkbox-btn">
                    <input type="radio" name="rooms" value="0" disabled>
                    Любое
                </li>
                <li class="checkbox-btn">
                    <input type="radio" name="rooms" value="1">
                    1
                </li>
                <li class="checkbox-btn">
                    <input type="radio" name="rooms" value="2">
                    2
                </li>
                <li class="checkbox-btn">
                    <input type="radio" name="rooms" value="3">
                    3
                </li>
                <li class="checkbox-btn">
                    <input type="radio" name="rooms" value="-1">
                    Более
                </li>
            </ul>
        </div>
    </article>
    <!-- Количество гостей -->
    <article class="filter-group">
        <header class="card-header">
            <i class="icon-control fa fa-chevron-down"></i>
            <h6 class="title">Количество гостей</h6>
        </header>
        <div class="filter-content collapse show pt-3 pr-3" id="collapse_4">
            <ul class="list-menu">
                <li class="checkbox-btn">
                    <input type="radio" name="guests" value="0" disabled>
                    Любое
                </li>
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
                    <input type="radio" name="guests" value="-1">
                    Более
                </li>
            </ul>
        </div>
    </article>
    <!-- Цена -->
    <article class="filter-group">
        <header class="card-header">
            <i class="icon-control fa fa-chevron-down"></i>
            <h6 class="title">Цена</h6>
        </header>
        <div class="filter-content collapse show" id="collapse_3" style="">
            <div class="card-body">
                <input type="range" class="custom-range" min="0" max="100" disabled>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Min
                            <input type="number" class="form-control" name="minprice" placeholder="0">
                        </label>
                    </div>
                    <div class="form-group text-right col-md-6">
                        <label>Max
                            <input type="number" class="form-control" name="maxprice" placeholder="100000">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <!-- Блок дополнительных фильтров (раскрывается нажатием кнопки) -->
    <div id="extraFilters">
        <!-- Город -->
        <article class="filter-group">
            <header class="card-header">
                <i class="icon-control fa fa-chevron-down"></i>
                <h6 class="title">Город</h6>
            </header>
            <div class="filter-content collapse show pt-3 pr-3" id="collapse_2">
                <div class="card-body">
                    <label>Город
                        <select name="place" class="block">
                            <option value="test">test</option>
                            <option value="test">test</option>
                        </select>
                    </label>
                </div>
            </div>
        </article>
        <!-- Даты бронирования -->
        <article class="filter-group">
            <header class="card-header">
                <i class="icon-control fa fa-chevron-down"></i>
                <h6 class="title">Даты бронирования</h6>
            </header>
            <div class="filter-content collapse show pt-3 pr-3" id="collapse_2">
                <div class="card-body">
                    <label>Начала
                        <input type="date" name="date">
                    </label>
                    <label>Окончание
                        <input type="date" name="date">
                    </label>
                </div>
            </div>
        </article>
    </div>
    <div class="card-body">
        <button class="btn btn-block btn-outline-primary" id="moreFilters">Больше фильтров</button>
    </div>
    <div class="card-body">
        <input type="submit" id="filterBtn" class="btn btn-block btn-primary" value="Применить">
        <input type="reset" id="filterResetBtn" class="btn btn-block btn-primary" value="Очистить">
    </div>
</form>
