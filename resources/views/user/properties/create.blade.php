@extends('layouts/app')
@section('content')
    <div class="container">

        <form method="post" action="{{ route('user.properties.store') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Заголовок</label>
                <input name="title" type="text" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="mb-3">
                Категория
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
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

{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="radio" name="my_address" id="flexRadioDefault2" checked>--}}
{{--                    <label class="form-check-label" for="flexRadioDefault2">--}}
{{--                        Мои сохраненные адреса:--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                @if(isset($user->property))--}}
{{--                <select name="address_id">--}}
{{--                    @foreach($user->property as $property)--}}
{{--                         <option value="{{ $property->address->id }}"> {{$property->category->title . ' - ' . $property->address->street }} </option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                @endif--}}

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="new_address" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Добавить новое объявление
                    </label>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Страна</label>
                        <input name="country" type="text" class="form-control" id="exampleFormControlInput1" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Город/поселок</label>
                        <input name="place" type="text" class="form-control" id="exampleFormControlInput1" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Улица</label>
                        <input name="street" type="text" class="form-control" id="exampleFormControlInput1" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Дом</label>
                        <input name="house_number" type="text" class="form-control" id="exampleFormControlInput1" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Квартира</label>
                        <input name="flat_number" type="text" class="form-control" id="exampleFormControlInput1" >
                    </div>
                </div>

            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Временная регистрация</label>
                <input name="is_temporary_registration_possible" type="checkbox" value="1" id="exampleFormControlInput1" >
            </div>
            <button class="btn btn-primary" type="submit">Отправить</button>
        </form>
    </div>
@endsection
