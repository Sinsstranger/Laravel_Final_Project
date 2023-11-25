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

            @forelse($deals as $deal)
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
                                <form method="post" action="{{ route('review.create') }}">
                                    @csrf
                                    <input type="hidden" name="property_id" value="{{ $deal->property->id }}">
                                    <input type="submit" class="btn btn-block btn-secondary" value="Оставить отзыв">
                                </form>

                            </li>
                        </ul>
{{--                        <x-rent-form :property="$deal->property" :deal="$deal">--}}
{{--                        </x-rent-form>--}}
                    </div>

            @empty
                    <h1>У Вас пока нет бронирований</h1>
            @endforelse

        </div>
  </div>
@endsection
