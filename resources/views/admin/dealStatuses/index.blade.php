@extends('layouts/admin')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Статусы сделок</h1>
        @include('inc.message')
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Статусы сделок
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <a href="{{ route('admin.dealStatuses.create') }}" type="button" class="btn btn-success" style="margin-bottom: 21px">Добавить</a>
                    <br>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Название</th>
                        <th>Опции</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Название</th>
                        <th>Опции</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @forelse($dealStatuses as $dealStatus)
                        <tr id="{{ $dealStatus->id }}">
                            <td>{{ $dealStatus->id }}</td>
                            <td>{{ $dealStatus->name }}</td>
                            <td><a href="{{ route('admin.dealStatuses.edit', $dealStatus) }}" type="button" class="btn btn-success">Редактировать</a>
                                {{-- <a href="{{ route('') }}" type="button" class="btn btn-outline-danger">Удалить</a> --}}
                                <form method="post" action="{{ route('admin.dealStatuses.destroy', $dealStatus) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger delete" value="Удалить">
                                    {{-- <x-primary-button :type="'submit'" class="index-del-btn">
                                        <span class="index-btn-span">Удалить</span>
                                    </x-primary-button> --}}
                                </form>
                            </td>
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
