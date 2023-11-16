@extends('layouts/admin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Панель</h1>
    <div class="card mb-4">
       <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Последние события
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Название</th>
                        <th>Дата</th>
                        <th>Опции</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Название</th>
                        <th>Дата</th>
                        <th>Опции</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse($eventsList as $event)
                    <tr id="{{ $event->id }}">
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->created_at }}</td>
                        
                        <td><a href="{{ $event->user_id != null ? route('admin.users.show', $event->user_id): route('admin.properties.show', $event->property_id)}}" type="button" class="btn btn-success">Показать</a></td>
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