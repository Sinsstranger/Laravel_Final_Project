@extends('layouts/admin')
@section('title')
    @parent Обратная связь
@endsection
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Обратная связь</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Обратная связь
            </div>
            <div class="box">
                <div class="table-scroll">
                    <table>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Почта</th>
                            <th>Телефон</th>
                            <th>Сообщение</th>
                            <th>Опции</th>
                        </tr>
                        </thead>
                    </table>
                    <div class="table-scroll-body">
                        <table>
                            <tbody>
                            @forelse($feedbacks as $feedback)
                                <tr id="{{ $feedback->id }}">
                                    <td>{{ $feedback->id }}</td>
                                    <td>{{ $feedback->first_name }}</td>
                                    <td>{{ $feedback->last_name }}</td>
                                    <td>{{ $feedback->email }}</td>
                                    <td>{{ $feedback->phone }}</td>
                                    <td><a href="{{ route('admin.feedbacks.show', $feedback) }}" type="button" class="btn btn-success">Показать</a></td>
                                    <td><a rel="{{ $feedback->id  }}" href="javascript:" type="button" class="btn btn-danger delete">Удалить</a></td>
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
                            send(`/admin/feedbacks/${id}`).then( () => {
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

