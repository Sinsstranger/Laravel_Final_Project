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
                        <th>Аватарка</th>
                        <th>Юзернейм</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Почта</th>
                        <th>Права</th>
                        <th>Опции</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Аватарка</th>
                        <th>Юзернейм</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Почта</th>
                        <th>Права</th>
                        <th>Опции</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse($usersList as $user)
                    <tr id="{{ $user->id }}">
                        <td>{{ $user->id }}</td>
                        <td><img src="{{ $user->avatar }}" alt="avatar" width="80px"></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                    @if($user->is_admin)
                        Админ
                    @else
                        Пользователь
                    @endif
                </td>
                        <td><a href="{{ route('admin.users.show', $user) }}" type="button" class="btn btn-success">Показать</a>
                            <a href="{{ route('admin.users.edit', $user) }}" type="button" class="btn btn-success">Редактировать</a>
                        <a rel="{{ $user->id  }}" type="button" class="btn btn-danger delete" href="javascript:" >Удалить</a></td>
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
    let elements = document.querySelectorAll(".delete");

        elements.forEach(function (element, key) {
            element.addEventListener('click', function() {
                console.log('click');
                const id = this.getAttribute('rel');
                console.log(id);
                if (confirm(`Подтверждаете удаление записи с #ID = ${id}`)) {
                    send(`/admin/users/${id}`).then( () => {
                        //location.reload();
                        console.log(id);
                        document.getElementById(id).remove();
                    });
                } else {
                    alert("Вы отменили удаление записи");
                }
            });
        });


        async function send(url) {
            let response = await fetch (url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
</script>
@endpush
