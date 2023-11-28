<div class="rent-section-left">
    <h1 class="text-lg font-medium ">Бронирование #{{$deal->id}}</h1>
    <ul class="max-w-xl">

        <li class="dashboard-link">
            <h2 class="text-lg font-medium text-gray-900">
                Статус бронирования
            </h2>
            <p class="mt-1 text-gray-600">
                {{$deal->status->name}}
            </p>
        </li>

        <li class="dashboard-link">
            <h2 class="text-lg font-medium text-gray-900">
                Объект бронирования
            </h2>
            <a href="{{ route('properties.show', $deal->property) }}">
                <p class="mt-1 text-gray-600">
                    {{$deal->property->title}}
                </p>
                <p class="mt-1 text-gray-600">
                    {{$deal->property->address->country}},
                    {{$deal->property->address->place}},
                    {{$deal->property->address->street}},
                    {{$deal->property->address->house_number}},
                    {{$deal->property->address->flat_number}},
                </p>
            </a>
        </li>

        <li class="dashboard-link">
            <h2 class="text-lg font-medium text-gray-900">
                Контакты владельца
            </h2>
            <p class="mt-1 text-gray-600">
                {{$deal->property->user->first_name}}&nbsp;{{$deal->property->user->last_name}}, {{$deal->property->user->phone}}
            </p>
        </li>

    </ul>
</div>

<div class="rent-section-right">
    <ul class="max-w-xl">
        <div>@if(($deal->rent_ends_at <= now() && $deal->status_id == 4) || $deal->status_id == 4 || $deal->status_id == 3)
                <div class="flex items-center gap-4 cabinet-index-btn">
                    <form method="post" action="{{ route('user.deals.destroy', $deal) }}">
                        @csrf
                        @method('DELETE')
                        <x-primary-button :type="'submit'" class="index-del-btn">
                            <span class="index-btn-span">Удалить бронирование</span>
                        </x-primary-button>
                    </form>
                </div>
            @endif

            @if($deal->rent_ends_at > now() && $deal->status_id != 4 && $deal->status_id > 1)
                <div class="flex items-center gap-4 cabinet-index-btn">
                    <form method="post" action="{{ route('user.deals.update', $deal) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status_id" value="4">
                        <x-primary-button :type="'submit'" class="index-del-btn">
                            <span class="index-btn-span">Завершить досрочно</span>
                        </x-primary-button>
                    </form>
                </div>
            @endif</div>

        <div class="rent-dates">
            <li class="dashboard-link">
                <h2 class="text-lg font-medium text-gray-900">
                    Дата заезда
                </h2>
                <p class="mt-1 text-gray-600">
                    {{$deal->rent_starts_at}}
                </p>
            </li>

            <li class="dashboard-link">
                <h2 class="text-lg font-medium text-gray-900">
                    Дата выезда
                </h2>
                <p class="mt-1 text-gray-600">
                    {{$deal->rent_ends_at}}
                </p>
            </li>

        </div>

        <li class="dashboard-link">
            <h2 class="text-lg font-medium text-gray-900">
                Полная стоимость аренды
            </h2>
            <p class="mt-1 text-gray-600">
                {{$deal->rent_costs}}₽
            </p>
        </li>

        <li class="dashboard-link">
            <h2 class="text-lg font-medium text-gray-900">
                Количество гостей
            </h2>
            <p class="mt-1 text-gray-600">
                {{$deal->guests}}
            </p>
        </li>

        <li class="dashboard-link">
            <h2 class="text-lg font-medium text-gray-900">
                Временная регистрация
            </h2>
            <p class="mt-1 text-gray-600">
                @if($deal->registration > 0)
                    Нужна
                @else
                    Не нужна
                @endif
            </p>
        </li>

    </ul>
</div>
