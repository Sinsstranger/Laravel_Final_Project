@extends('layouts/app')

@section('style')
    @parent<link rel="stylesheet" href="{{ asset("assets/css/cabinet.css") }}">
@endsection

@section('content')


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @include('inc.message')
<!-- @dump(session()->all()); -->
            <div class="flex justify-between items-center gap-4">
                <h1 class="text-lg font-medium text-gray-900 uppercase">
                    Мои объявления</h1>
                <x-primary-button>
                    <a href="{{ route('user.properties.create') }}">
                        Добавить объявление</a>
                </x-primary-button>
            </div>


            @forelse($propertiesUser as $property)
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex justify-between">

                        <ul class="max-w-xl">
                            <li class="dashboard-link">
                                <h2 class="text-lg font-medium text-gray-900">
                                Наименование
                                </h2>
                                <p class="mt-1 text-sm text-gray-600">
                                {{$property->title}}
                                </p>
                            </li>

                            <li class="dashboard-link">
                                <img src="{{$property->photo}}" alt="property photo"
                                style = "max-width:150px">
                            </li>

                            <!-- <li class="dashboard-link">
                                <h2 class="text-lg font-medium text-gray-900">
                                Описание
                                </h2>
                                <p class="mt-1 text-sm text-gray-600">
                                {{$property->description}}
                                </p>
                            </li> -->

                            <!-- <li class="dashboard-link">
                                <h2 class="text-lg font-medium text-gray-900">
                                Категория
                                </h2>
                                <p class="mt-1 text-sm text-gray-600">
                                    {{$property->category->title}}
                                </p>
                            </li> -->

                            <!-- <li class="dashboard-link">
                                <h2 class="text-lg font-medium text-gray-900">
                                Количество комнат
                                </h2>
                                <p class="mt-1 text-sm text-gray-600">
                                {{$property->number_of_rooms}}
                                </p>
                            </li>

                            <li class="dashboard-link">
                                <h2 class="text-lg font-medium text-gray-900">
                                Количество гостей
                                </h2>
                                <p class="mt-1 text-sm text-gray-600">
                                {{$property->number_of_guests}}
                                </p>
                            </li> -->

                            <li class="dashboard-link">
                                    <h2 class="text-lg font-medium text-gray-900">
                                        Срок аренды
                                    </h2>
                                    <div>
                                        @if($property->daily_rent)
                                        <p class="mt-1 text-sm text-gray-600">
                                            Посуточная аренда
                                        </p>
                                        @else
                                        <p class="mt-1 text-sm text-gray-600">
                                            Долгосрочная аренда
                                        </p>
                                        @endif
                                    </div>
                            </li>

                            <li class="dashboard-link">
                                <h2 class="text-lg font-medium text-gray-900">
                                Адрес
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">
                                {{$property->address->country}},
                                {{$property->address->place}},
                                {{$property->address->street}},
                                {{$property->address->house_number}} -
                                {{$property->address-> flat_number}}
                                </p>
                            </li>

                            <li class="dashboard-link">

                                @if($property->daily_rent)
                                    <h2 class="text-lg font-medium text-gray-900">
                                        Цена за сутки
                                    </h2>
                                    @else
                                    <h2 class="text-lg font-medium text-gray-900">
                                        Цена за месяц
                                    </h2>
                                @endif

                                <p class="mt-1 text-sm text-gray-600">
                                    {{$property->price_per_day}}
                                </p>
                            </li>

                            <!-- <li class="dashboard-link">
                                <h2 class="text-lg font-medium text-gray-900">
                                Возможность временной регистрации
                                </h2>
                                    <div>
                                        @if($property->is_temporary_registration_possible)
                                        <p class="mt-1 text-sm text-gray-600">Да</p>
                                        @else
                                        <p class="mt-1 text-sm text-gray-600">Нет</p>
                                        @endif
                                    </div>
                            </li> -->

                            <li class="dashboard-link show-catalog-item-link">
                                <a href="{{ route ('properties.show', $property) }}" class="text-lg font-medium text-gray-900">
                                    >> Показать объявление в каталоге >>
                                </a>

                            </li>

                            <li class="dashboard-link flex justify-between">
                                <div class="flex items-center gap-4 cabinet-index-btn">
                                    <x-primary-button>
                                    <a href="{{ route('user.properties.edit', $property) }}">
                                                        Редактировать объявление
                                                    </a>
                                    </x-primary-button>
                                </div>
                                <div class="flex items-center gap-4 cabinet-index-btn">
                                        <form method="post" action="{{ route('user.properties.destroy', $property) }}">
                                            @csrf
                                            @method('DELETE')
                                            <x-primary-button :type="'submit'" class="index-del-btn">
                                                <span class="index-btn-span">Удалить объявление</span>
                                            </x-primary-button>
                                        </form>
                                </div>
                            </li>

                        </ul>

                        {{--                        Модалка брони--}}
                        <div id="dealModal" class="dealModalWindow">
                            <ul class="max-w-xl">

                                <li class="dashboard-link">
                                    <h2 class="text-lg font-medium text-gray-900">
                                        Старт бронирования
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600">
                                        {{--                                        {{$deal->rent_starts_at}}--}}
                                    </p>
                                </li>

                                <li class="dashboard-link">
                                    <h2 class="text-lg font-medium text-gray-900">
                                        Окончание бронирования
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600">
                                        {{--                                        {{$deal->rent_ends_at}}--}}
                                    </p>
                                </li>

                                <li class="dashboard-link">
                                    <h2 class="text-lg font-medium text-gray-900">
                                        Общая сумма бронирования
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600">
                                        {{--                                        {{$deal->rent_costs}}--}}
                                    </p>
                                </li>

                                <li class="dashboard-link">
                                    <h2 class="text-lg font-medium text-gray-900">
                                        Статус бронирования
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600">
                                        {{--                                        {{$deal->status->name}}--}}
                                    <form method="post"
{{--                                          action=" {{ route('user.properties.store') }}"--}}
                                    >
                                        @csrf
                                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                        <label for="status->name" class="text-lg font-medium text-gray-900" >Статус</label>
                                        <select name="status->name" id="status->name"
                                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                       shadow-sm mt-1 block w-full" required>
                                            {{--@foreach()
                                                <option value="{{ $deal->status_name }}"
                                                    @selected ($property->category->id ??
                                                    (old('category->id') == $deal->status_name))>{{$deal->status_name}}</option>
                                            @endforeach--}}
                                        </select>
                                    </div>

                                    </form>



                                    </p>
                                </li>

                                <li class="dashboard-link">
                                    <h2 class="text-lg font-medium text-gray-900">
                                        Объект бронирования
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600">
                                        {{--                                        {{$deal->property->title}}--}}
                                    </p>
                                    <p class="mt-1 text-sm text-gray-600">
                                        {{--                                        {{$deal->property->address->country}},--}}
                                        {{--                                        {{$deal->property->address->place}},--}}
                                        {{--                                        {{$deal->property->address->street}},--}}
                                        {{--                                        {{$deal->property->address->house_number}},--}}
                                        {{--                                        {{$deal->property->address-> flat_number}},--}}
                                    </p>
                                </li>

                                <li class="dashboard-link flex justify-between">
                                    <div class="flex items-center gap-4 cabinet-index-btn">
                                        <x-primary-button>
                                            <a href="#">
                                                Редактировать бронирование
                                            </a>
                                        </x-primary-button>
                                    </div>

                                </li>

                            </ul>

                        </div>

{{--                        Список бронирований--}}

                        <div class="max-w-xl">
                            <h1 class="text-lg font-medium text-gray-900"
                                style="text-align: center">
                                Заявки на бронирование
                            </h1>

                            <ul class="max-w-xl"
                            style="border:1px solid darkgray; border-radius: 10px;">
{{--                                @forelse($property->deals as $deal)--}}
                                    <li class="dashboard-link">
                                        <h2 class="text-lg font-small text-gray-900">
                                            Заявка от
                                        </h2>
                                        <p class="mt-1 text-sm text-gray-600">

{{--                                            {{$deal->created_at}}--}}
                                        </p>

                                        <h2 class="text-lg font-small text-gray-900">
                                            Статус
                                        </h2>
                                        <p class="mt-1 text-sm text-gray-600">
{{--                                            {{$deal->deal_statuses->name}}                                            --}}
                                        </p>

                                        <a class="modal-link-text"
                                           href="#" id="showDeal">
                                            Показать заявку</a>

                                    </li>
{{--                                @empty--}}
{{--                                    <h1>У Вас пока нет заявок</h1>--}}
{{--                                @endforelse--}}
                            </ul>

                        </div>



                    </div>
            @empty
                    <h1>У Вас пока нет объявлений</h1>
            @endforelse
        </div>
    </div>

    <script>

        let dealPopUP = document.getElementById("dealModal");
        let dealLinkPopUP = document.getElementById("showDeal");

        dealLinkPopUP.onclick = function (){
            //console.log('Hello')
            dealPopUP.style.display="block";
        }

        /*enterLink.onmouseout = function (){
            popUP[0].style.display = "none";
        }*/

        window.onclick = function(event) {
            if (event.target !== dealLinkPopUP) {
                dealPopUP.style.display = "none";
            }
        }

    </script>

@endsection








