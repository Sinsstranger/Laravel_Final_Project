@extends('layouts/admin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Объявления</h1>
    <select id="filter" style="margin-bottom: 21px">
        <option>Выбрать категорию</option>
        <option>квартира</option>
        <option>дом</option>
        <option>коттедж</option>
        <option>комната</option>
        <option>гостиница</option>
        <option>кемпинг</option>
        <option>база отдыха</option>
        <option>хостел</option>
    </select>
    <a href="{{ route('admin.properties.index') }}" type="button" class="btn btn-success">Все категории</a>
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
                <tfoot>
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
                        <td>
                            @foreach($property->photo as $photo)
                            <img src="{{ $photo }}" width="80px">
                          @endforeach

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

@endsection
@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let filter = document.getElementById("filter");
            filter.addEventListener("change", function (event) {
                location.href = "?f=" + this.value;
            });
        });
    </script>
@endpush
