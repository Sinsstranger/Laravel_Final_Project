@extends('layouts/admin')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Редактор объявления</h1>
        @include('inc.message')
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                {{ $property->title }}
            </div>

            <form  method="post" action="{{ route('admin.properties.update', $property) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Категория</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ old('title')?? $property->title }}">
                </div>
                <div class="form-group">
                    <label for="category_id">Номер категории</label>
                    <input type="number" name="category_id" class="form-control" id="category_id" value="{{ old('category_id')?? $property->category_id }}">
                </div>
                <div class="form-group">
                    <label for="number_of_rooms">Количество комнат</label>
                    <input type="number" name="number_of_rooms" class="form-control" id="number_of_rooms" value="{{ old('number_of_rooms')?? $property->number_of_rooms }}">
                </div>
                <div class="form-group">
                    <label for="number_of_guests">Количество гостей</label>
                    <input type="number" name="number_of_guests" class="form-control" id="number_of_guests" value="{{ old('number_of_guests')?? $property->number_of_guests }}">
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <input type="text" name="description" class="form-control" id="description" value="{{ old('description')?? $property->description }}">
                </div>
                <div class="form-group">
                    <label for="photo">Фото</label>
                    @foreach($property->photo as $photo)
                    <img src="{{ $photo }}" width="100">
                    <input type="file" name="photo" class="form-control" id="photo">
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="price_per_day">Цена за день</label>
                    <input type="number" name="price_per_day" class="form-control" id="price_per_day" value="{{ old('price_per_day')?? $property->price_per_day }}">
                </div>
                <div class="form-group">
                    <label for="address_id">id адреса</label>
                    <input type="number" name="address_id" class="form-control" id="address_id" value="{{ old('address_id')?? $property->address_id }}">
                </div>
                <div class="form-group">
                    <label for="user_id">id пользователя</label>
                    <input type="number" name="user_id" class="form-control" id="user_id" value="{{ old('user_id')?? $property->user_id }}">
                </div>
                <div class="form-group">
                    <label for="is_temporary_registration_possible">Свободен/занят</label>
                    <input type="number" name="is_temporary_registration_possible" class="form-control" id="is_temporary_registration_possible" value="{{ old('is_temporary_registration_possible')?? $property->is_temporary_registration_possible }}">
                </div>
                <div class="form-group">
                    <label for="daily_rent">Посуточно</label>
                    <input type="number" name="daily_rent" class="form-control" id="daily_rent" value="{{ old('daily_rent')?? $property->daily_rent }}">
                </div>
                <br>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>

@endsection
