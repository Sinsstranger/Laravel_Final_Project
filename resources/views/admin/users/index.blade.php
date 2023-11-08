@extends('layouts/admin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Пользователи</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Пользователи
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Имя</th>
                        <th>Почта</th>
                        <th>Админ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Имя</th>
                        <th>Почта</th>
                        <th>Админ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse($usersList as $user)
                    <tr id="{{ $user->id }}">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->is_admin }}</td> 
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