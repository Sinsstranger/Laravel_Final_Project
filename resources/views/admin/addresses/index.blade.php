@extends('layouts/admin')
@section('title')
    @parent Адреса
@endsection
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Адреса</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Адреса
            </div>
            <div class="box">
    <div class="table-scroll">
        <table>
                    <a href="{{ route('admin.addresses.create') }}" type="button" class="btn btn-success" style="margin-bottom: 21px">Добавить</a>
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
                   </table>
        <div class="table-scroll-body">
            <table>
                    <tbody>
                    @forelse($addresses as $address)
                        <tr id="{{ $address->id }}">
                            <td>{{ $address->id }}</td>
                            <td>{{ $address->country }}</td>
                            <td>{{ $address->place }}</td>
                            <td>{{ $address->street }}</td>
                            <td>{{ $address->house_number }}</td>
                            <td>{{ $address->flat_number }}</td>
                            <td><a href="{{ route('admin.addresses.edit', $address) }}" type="button" class="btn btn-success">Редактировать</a>
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
    </div>

@endsection

@push('js')
    <script>
        let elements = document.querySelectorAll(".delete");
        elements.forEach(function (element, key) {
            element.addEventListener('click', function() {
                const id = this.getAttribute('rel');
                if (confirm(`Подтверждаете удаление записи с #ID = ${id}`)) {
                    send(`/admin/addresses/${id}`).then( () => {
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


