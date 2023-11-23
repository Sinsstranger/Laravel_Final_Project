@extends('layouts/admin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Объявления</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Объявления
        </div>
        <div class="box">
            <div class="table-scroll">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Категория</th>
                            <th>Номер категории</th>
                            <th>Количество комнат</th>
                            <th>Количество гостей</th>
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
                </table>
                <div class="table-scroll-body">
                    <table> 
                        <tbody>
                    @forelse($propertiesList as $property)
                            <tr id="{{ $property->id }}">
                                <td>{{ $property->id }}</td>
                                <td>{{ $property->title }}</td>
                                <td>{{ $property->category_id }}</td>
                                <td>{{ $property->number_of_rooms }}</td>
                                <td>{{ $property->number_of_guests }}</td>
                                <td>{{ $property->description }}</td>
                                <td> 
                                     @if(is_array($property->photo))
                @foreach($property->photo as $photo) 
                                    <img src="{{ $photo }}" width="80px">
            @endforeach
            @else 
                                    <img src="{{ $property->photo }}" width="80px">
            @endif
                                </td>
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
                                <td><a href="{{ route('admin.properties.show', $property) }}" type="button" class="btn btn-success">Показать</a>
                                    <a href="{{ route('admin.properties.edit', $property) }}" type="button" class="btn btn-success">Редактировать</a></td>
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
    </div>

@endsection
