@extends('layouts/admin')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Объявления</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Объявления
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Заголовок</th>
                        <th>Номер категории</th>
                        <th>Номер недвижимости</th>
                        <th>Номер гостя</th>
                        <th>Описание</th>
                        <th>Фото</th>
                        <th>Цена за день</th>
                        <th>id адреса</th>
                        <th>id пользователя</th>
                        <th>Свободен/занят</th>
                        <th>Посуточно</th>
                        <th>Права</th>
                        <th>Опции</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Заголовок</th>
                        <th>Номер категории</th>
                        <th>Номер недвижимости</th>
                        <th>Номер гостя</th>
                        <th>Описание</th>
                        <th>Фото</th>
                        <th>Цена за день</th>
                        <th>id адреса</th>
                        <th>id пользователя</th>
                        <th>Свободен/занят</th>
                        <th>Посуточно</th>
                        <th>Права</th>
                        <th>Опции</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @forelse($propertiesList as $property)
                        <tr id="{{ $property->id }}">
                            <td>{{ $property->id }}</td>
                            <td>{{ $property->title }}</td>
                            <td>{{ $property->category_id }}</td>
                            <td>{{ $property->number_of_rooms }}</td>
                            <td>{{ $property->number_of_guests }}</td>
                            <td>{{ $property->description }}</td>
                            <td>{{ $property->photo}}</td>
                            <td>{{ $property->price_per_day}}</td>
                            <td>{{ $property->address_id}}</td>
                            <td>{{ $property->user_id}}</td>
                            <td>{{ $property->is_temporary_registration_possible}}</td>
                            <td>{{ $property->daily_rent}}</td>
                            <td>
                                @if($property->is_admin)
                                    Админ
                                @else
                                    Пользователь
                                @endif
                            </td>
                            <td><a href="#" type="button" class="btn btn-success">Показать</a> <a href="#" type="button" class="btn btn-success">Редактировать</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan='4'>Записей нет</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
