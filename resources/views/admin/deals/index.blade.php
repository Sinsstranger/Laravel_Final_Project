@extends('layouts/admin')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Сделки</h1>
        <select id="filter" style="margin-bottom: 21px">
            <option>Выбрать статус</option>
            <option>1 на рассмотрении</option>
            <option>2 подтверждена</option>
            <option>3 отклонена</option>
            <option>4 завершена</option>
            <option>5 назначен показ</option>
        </select>
        <a href="{{ route('admin.deals.index') }}" type="button" class="btn btn-success">Все статусы</a>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Сделки
            </div>
            <div class="box">
    <div class="table-scroll">
        <table>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ID объявления</th>
                        <th>ID арендатора</th>
                        <th>Начало аренды</th>
                        <th>Конец аренды</th>
                        <th>Стоимость</th>
                        <th>Гости</th>
                        <th>Регистрация</th>
                        <th>Статус заявки</th>
                        <th>Опции</th>
                    </tr>
                    </thead>
                     </table>
        <div class="table-scroll-body">
            <table>
                    <tbody>
                    @forelse($deals as $deal)
                        <tr id="{{ $deal->id }}">
                            <td>{{ $deal->id }}</td>
                            <td>{{ $deal->property_id }}</td>
                            <td>{{ $deal->tenant_id }}</td>
                            <td>{{ $deal->rent_starts_at }}</td>
                            <td>{{ $deal->rent_ends_at }}</td>
                            <td>{{ $deal->rent_costs }}</td>
                            <td>{{ $deal->guests }}</td>
                            <td>{{ $deal->registration }}</td>
                            <td>{{ $deal->status_id }}</td>
                            <td><a href="{{ route('admin.deals.edit', $deal) }}" type="button" class="btn btn-success">Редактировать</a>
                                <a rel="{{ $deal->id  }}" href="javascript:" type="button" class="btn btn-danger delete">Удалить</a></td>
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
        document.addEventListener("DOMContentLoaded", function() {
            let filter = document.getElementById("filter");
            filter.addEventListener("change", function (event) {
                location.href = "?f=" + this.value;
            });
        });

        let elements = document.querySelectorAll(".delete");
        elements.forEach(function (element, key) {
            element.addEventListener('click', function() {
                const id = this.getAttribute('rel');
                if (confirm(`Подтверждаете удаление записи с #ID = ${id}`)) {
                    send(`/admin/deals/${id}`).then( () => {
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




