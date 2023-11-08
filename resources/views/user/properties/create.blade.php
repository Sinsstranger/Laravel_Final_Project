@extends('layouts/app')
@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <form method="post" enctype="multipart/form-data" action="{{ route('user.properties.store') }}">
                @csrf
                <div class="card" style="width: 23rem; margin-top: 30px;">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>
                <div class="card-body">
                    <h5 class="card-title">
                        <textarea name="title" class="form-control" id="exampleFormControlTextarea1" rows="3" required>
                            Заголовок
                        </textarea>
                    </h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Категория
                        <select name="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" selected >{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li class="list-group-item">
                        <div class="mb-3">
                            <label for="exampleFormControlInput10" class="form-label" >Количество комнат</label>
                            <input name="number_of_rooms" type="text" class="form-control" id="exampleFormControlInput10" required >
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput11" class="form-label">Количество возможных гостей</label>
                            <input name="number_of_guests" type="text" class="form-control" id="exampleFormControlInput11"required >
                        </div>
                    </li>
                    <li class="list-group-item">Описание
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                    </li>
                    <li class="list-group-item">
                        <label for="exampleFormControlInput1" class="form-label">Цена</label>
                        <input name="price_per_day" type="number" class="form-control" id="exampleFormControlInput1" required >
                    </li>
                    <li class="list-group-item">
                                Адрес:
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Страна</label>
                            <input name="country" type="text" class="form-control" id="exampleFormControlInput1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Город/поселок</label>
                            <input name="place" type="text" class="form-control" id="exampleFormControlInput1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Улица</label>
                            <input name="street" type="text" class="form-control" id="exampleFormControlInput1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Дом</label>
                            <input name="house_number" type="text" class="form-control" id="exampleFormControlInput1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Квартира</label>
                            <input name="flat_number" type="text" class="form-control" id="exampleFormControlInput1" required >
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Временная регистрация</label>
                            <input name="is_temporary_registration_possible" type="checkbox" value="1" id="exampleFormControlInput1" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Посуточная аренда</label>
                            <input name="daily_rent" type="checkbox" value="1" id="exampleFormControlInput1"  >
                        </div>
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Добавить фотографию</label>
                            <input name="photo" class="form-control form-control-sm" id="formFileSm" type="file">
                        </div>
                    </li>
                </ul>
                    <div class="card-body">
                        <button type="submit" class="card-link">Опубликовать объявление</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
