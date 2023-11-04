@extends('layouts/app')
@section('content')
    <div class="container">

        <form>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Заголовок</label>
                <input name="title" type="text" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="mb-3">
                Категория
                <select name="category_id">
                    @foreach($categories as $category)
                        <option selected>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Цена</label>
                <input name="price_per_day" type="number" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="mb-3">
                Адрес:
                <select name="address_id">
                    <option>Адрес</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Временная регистрация</label>
                <input name="is_temporary_registration_possible" type="checkbox" class="form-control" id="exampleFormControlInput1" >
            </div>
        </form>
    </div>
@endsection
