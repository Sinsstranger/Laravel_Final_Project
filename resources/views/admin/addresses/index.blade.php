@extends('layouts/admin')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Адреса</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Адреса
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <a href="#" type="button" class="btn btn-success" style="margin-bottom: 21px">Добавить</a>
                    <br>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Страна</th>
                        <th>Населенный пункт</th>
                        <th>Улица</th>
                        <th>Номер дома</th>
                        <th>Номер квартиры</th>
                        <th>Опции</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Страна</th>
                        <th>Населенный пункт</th>
                        <th>Улица</th>
                        <th>Номер дома</th>
                        <th>Номер квартиры</th>
                        <th>Опции</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @forelse($addresses as $address)
                        <tr id="{{ $address->id }}">
                            <td>{{ $address->id }}</td>
                            <td>{{ $address->country }}</td>
                            <td>{{ $address->place }}</td>
                            <td>{{ $address->street }}</td>
                            <td>{{ $address->house_number }}</td>
                            <td>{{ $address->flat_number }}</td>
                            <td><a href="#" type="button" class="btn btn-success">Редактировать</a>
                                <a rel="{{ $address->id  }}" href="javascript:" type="button" class="btn btn-danger delete">Удалить</a></td>
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

