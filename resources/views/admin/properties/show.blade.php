@extends('layouts/admin')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Карточка объявления</h1>
        @include('inc.message')
        <div class="card mb-4">
            <div class="card-header">
                ID -
                {{ $property->id }}
            </div>
            <div class="card-header">
                Категория -
                {{ $property->title }}
            </div>
            <div class="card-header">
                Номер категории -
                {{ $property->category_id }}
            </div>
            <div class="card-header">
                Номер недвижимости -
                {{ $property->number_of_rooms }}
            </div>
            <div class="card-header">
                Номер гостя -
                {{ $property->number_of_guests }}
            </div>
            <div class="card-header">
                Описание -
                {{ $property->description }}
            </div>
            <div class="card-header">
                Фото -
                {{ $property->photo}}
            </div>
            <div class="card-header">
                Цена за день -
                {{ $property->price_per_day}}
            </div>
            <div class="card-header">
                id адреса -
                {{ $property->address_id}}
            </div>
            <div class="card-header">
                id пользователя -
                {{ $property->user_id}}
            </div>
            <div class="card-header">
                Свободен/занят -
                {{ $property->is_temporary_registration_possible}}
            </div>
            <div class="card-header">
                Посуточно -
                {{ $property->daily_rent}}
            </div>
        </div>
    </div>

@endsection
