@extends('layouts/app')

@section('style')
    @parent<link rel="stylesheet" href="{{ asset("assets/css/cabinet.css") }}">

@endsection

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @include('inc.message')

            <div class="flex justify-between items-center gap-4">
                <h1 class="text-lg font-medium text-gray-900 uppercase">Мои бронирования</h1>
            </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg ">

                    <button class="accordion">Заявки</button>
                    <div class="panel">
                        @if ($deals->contains('status_id', 1))
                            @foreach($deals as $deal)
                                @if ($deal->status_id === 1)
                                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex between">

                                <ul class="max-w-xl">

                                    <li class="dashboard-link">
                                        <h2 class="text-lg font-medium text-gray-900">
                                            Старт бронирования
                                        </h2>
                                        <p class="mt-1 text-sm text-gray-600">
                                            {{$deal->rent_starts_at}}
                                        </p>
                                    </li>

                                    <li class="dashboard-link">
                                        <h2 class="text-lg font-medium text-gray-900">
                                            Окончание бронирования
                                        </h2>
                                        <p class="mt-1 text-sm text-gray-600">
                                            {{$deal->rent_ends_at}}
                                        </p>
                                    </li>

                                    <li class="dashboard-link">
                                        <h2 class="text-lg font-medium text-gray-900">
                                            Общая сумма бронирования
                                        </h2>
                                        <p class="mt-1 text-sm text-gray-600">
                                            {{$deal->rent_costs}}₽
                                        </p>
                                    </li>

                                    <li class="dashboard-link">
                                        <h2 class="text-lg font-medium text-gray-900">
                                            Статус бронирования
                                        </h2>
                                        <p class="mt-1 text-sm text-gray-600">
                                            {{$deal->status->name}}
                                        </p>
                                    </li>

                                    <li class="dashboard-link">
                                        <h2 class="text-lg font-medium text-gray-900">
                                            Объект бронирования
                                        </h2>
                                        <p class="mt-1 text-sm text-gray-600">
                                            {{$deal->property->title}}
                                        </p>
                                        <p class="mt-1 text-sm text-gray-600">
                                            {{$deal->property->address->country}},
                                            {{$deal->property->address->place}},
                                            {{$deal->property->address->street}},
                                            {{$deal->property->address->house_number}},
                                            {{$deal->property->address->flat_number}},
                                        </p>
                                    </li>
                            <li class="dashboard-link flex justify-between">
                                <div class="flex items-center gap-4 cabinet-index-btn">
                                    <form method="post" action="{{ route('user.deals.destroy', $deal) }}">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button :type="'submit'" class="index-del-btn">
                                            <span class="index-btn-span">Удалить заявку</span>
                                        </x-primary-button>
                                    </form>
                                </div>
                                </ul>
                            </div>
                               @endif
                            @endforeach
                        @else
                            <p>У вас нет заявок на аренду</p>
                        @endif
                    </div>

                    <button class="accordion">Актуальное</button>
                    <div class="panel">
                        @if ($deals->contains('status_id', 2))
                            @foreach($deals as $deal)
                                @if ($deal->status_id === 2)
                                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex between">

                                    <ul class="max-w-xl">

                                        <li class="dashboard-link">
                                            <h2 class="text-lg font-medium text-gray-900">
                                                Старт бронирования
                                            </h2>
                                            <p class="mt-1 text-sm text-gray-600">
                                                {{$deal->rent_starts_at}}
                                            </p>
                                        </li>

                                        <li class="dashboard-link">
                                            <h2 class="text-lg font-medium text-gray-900">
                                                Окончание бронирования
                                            </h2>
                                            <p class="mt-1 text-sm text-gray-600">
                                                {{$deal->rent_ends_at}}
                                            </p>
                                        </li>

                                        <li class="dashboard-link">
                                            <h2 class="text-lg font-medium text-gray-900">
                                                Общая сумма бронирования
                                            </h2>
                                            <p class="mt-1 text-sm text-gray-600">
                                                {{$deal->rent_costs}}₽
                                            </p>
                                        </li>

                                        <li class="dashboard-link">
                                            <h2 class="text-lg font-medium text-gray-900">
                                                Статус бронирования
                                            </h2>
                                            <p class="mt-1 text-sm text-gray-600">
                                                {{$deal->status->name}}
                                            </p>
                                        </li>

                                        <li class="dashboard-link">
                                            <h2 class="text-lg font-medium text-gray-900">
                                                Объект бронирования
                                            </h2>
                                            <p class="mt-1 text-sm text-gray-600">
                                                {{$deal->property->title}}
                                            </p>
                                            <p class="mt-1 text-sm text-gray-600">
                                                {{$deal->property->address->country}},
                                                {{$deal->property->address->place}},
                                                {{$deal->property->address->street}},
                                                {{$deal->property->address->house_number}},
                                                {{$deal->property->address->flat_number}},
                                            </p>
                                        </li>

                                        <li class="dashboard-link flex justify-between">
                                            <div class="flex items-center gap-4 cabinet-index-btn">
                                                <x-primary-button>
                                                    <a href="{{ route('properties.show', $deal->property) }}">Забронировать повторно</a>
                                                </x-primary-button>
                                            </div>
                                            @if(($deal->rent_ends_at <= now() && $deal->status_id == 4) || $deal->status_id == 4 || $deal->status_id == 3)
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
                                            @if($deal->rent_ends_at > now() && $deal->status_id != 4)
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
                                            @endif

                                        </li>
                                    </ul>
                                </div>
                               @endif
                            @endforeach
                        @else
                            <p>Сейчас у вас нет подтверждённых заявок или действующего бронирования</p>
                        @endif
                    </div>

                    <button class="accordion">Архив</button>
                    <div class="panel">
                        @if ($deals->contains('status_id', 3) || $deals->contains('status_id', 4))
                            @foreach($deals as $deal)
                                @if($deal->status_id === 3 && 4)
                                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex between">

                                    <ul class="max-w-xl">

                                        <li class="dashboard-link">
                                            <h2 class="text-lg font-medium text-gray-900">
                                                Старт бронирования
                                            </h2>
                                            <p class="mt-1 text-sm text-gray-600">
                                                {{$deal->rent_starts_at}}
                                            </p>
                                        </li>

                                        <li class="dashboard-link">
                                            <h2 class="text-lg font-medium text-gray-900">
                                                Окончание бронирования
                                            </h2>
                                            <p class="mt-1 text-sm text-gray-600">
                                                {{$deal->rent_ends_at}}
                                            </p>
                                        </li>

                                        <li class="dashboard-link">
                                            <h2 class="text-lg font-medium text-gray-900">
                                                Общая сумма бронирования
                                            </h2>
                                            <p class="mt-1 text-sm text-gray-600">
                                                {{$deal->rent_costs}}₽
                                            </p>
                                        </li>

                                        <li class="dashboard-link">
                                            <h2 class="text-lg font-medium text-gray-900">
                                                Статус бронирования
                                            </h2>
                                            <p class="mt-1 text-sm text-gray-600">
                                                {{$deal->status->name}}
                                            </p>
                                        </li>

                                        <li class="dashboard-link">
                                            <h2 class="text-lg font-medium text-gray-900">
                                                Объект бронирования
                                            </h2>
                                            <p class="mt-1 text-sm text-gray-600">
                                                {{$deal->property->title}}
                                            </p>
                                            <p class="mt-1 text-sm text-gray-600">
                                                {{$deal->property->address->country}},
                                                {{$deal->property->address->place}},
                                                {{$deal->property->address->street}},
                                                {{$deal->property->address->house_number}},
                                                {{$deal->property->address->flat_number}},
                                            </p>
                                        </li>

                                        <li class="dashboard-link flex justify-between">
                                            <div class="flex items-center gap-4 cabinet-index-btn">
                                                <x-primary-button>
                                                    <a href="{{ route('properties.show', $deal->property) }}">Забронировать повторно</a>
                                                </x-primary-button>
                                            </div>
                                            @if(($deal->rent_ends_at <= now() && $deal->status_id == 4) || $deal->status_id == 4 || $deal->status_id == 3)
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
                                        </li>

                                    </ul>
                                </div>
                               @endif
                            @endforeach
                        @else
                            <p>У вас пока нет отклонённых или завершённых бронирвоаний</p>
                        @endif
                    </div>

                    <button class="accordion">Отзывы</button>
                    <div class="panel">
                        <p>Здесь будут отзывы на бронирования со статусом 4-Завершен</p>
                    </div>
                </div>

        </div>
        <button onclick="topFunction()" id="myBtn" title="Go to top">Наверх</button>
  </div>
@endsection
@section('script')
    @parent
    <script src="{{ asset("assets/js/cabinet.js") }}"></script>
@endsection
