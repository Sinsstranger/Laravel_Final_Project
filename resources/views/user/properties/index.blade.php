@extends('layouts/app')

@section('style')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset("assets/css/cabinet.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/object.css") }}">
@endsection

@section('content')

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @include('inc.message')

            <div class="flex justify-between items-center gap-4">
                <h1 class="text-lg font-medium text-gray-900 uppercase">
                    Опубликованные объявления</h1>
                <x-primary-button>
                    <a href="{{ route('user.properties.create') }}">
                        Добавить объявление</a>
                </x-primary-button>
            </div>

            @forelse($propertiesUser as $property)


                    <div id="{{ $property->id }}" class="p-4 sm:p-8 bg-white shadow sm:rounded-lg justify-between properties_flex">

                        <div class="deal-section">

                            <div class="deal-section-right">
                                <h1 class="text-lg font-medium" style="color: #4b69bd;">Объявление #{{$property->id}}</h1>
                                <ul class="max-w-xl">
                                    <li class="dashboard-link">
                                        <h2 class="text-lg font-medium text-gray-900">
                                            {{$property->title}}
                                        </h2>
                                        <p class="mt-1 text-sm text-gray-600">

                                        </p>
                                    </li>
                                    @foreach($property->photo as $photo)
                                        <li class="dashboard-link">
                                            <img src="{{$photo}}" alt="property photo">
                                        </li>
                                @endforeach
                                </ul>
                            </div>

                            <div class="deal-section-center">
                                <ul class="max-w-xl">

                                    <li class="dashboard-link">
                                        <h2 class="text-lg font-medium text-gray-900">
                                            {{$property->address->country}},
                                            {{$property->address->place}},
                                            {{$property->address->street}},
                                            {{$property->address->house_number}} -
                                            {{$property->address-> flat_number}}
                                        </h2>
                                    </li>

                                    <li class="dashboard-link">
                                        <h2 class="text-lg font-medium text-gray-900">
                                            Описание
                                        </h2>
                                        <p class="mt-1 text-sm text-gray-600">
                                            {{$property->description}}
                                        </p>
                                    </li>

                                    <li class="dashboard-link show-catalog-item-link">
                                        <a href="{{ route ('properties.show', $property) }}" class="text-lg font-medium text-gray-900">
                                            Посмотреть объявление в каталоге >
                                        </a>
                                    </li>
                                </ul>

                                <div class="deal-section-btn">
                                    <div class="items-center gap-4 cabinet-index-btn">
                                        <x-primary-button>
                                            <a href="{{ route('user.properties.edit', $property) }}">
                                                Редактировать
                                            </a>
                                        </x-primary-button>
                                    </div>


                                    <div class="flex items-center gap-4 cabinet-index-btn">
                                        <form method="post" action="{{ route('user.properties.destroy', $property) }}">
                                            @csrf
                                            @method('DELETE')
                                            <x-secondary-button :type="'submit'" class="index-del-btn">
                                                <span class="index-btn-span">Удалить</span>
                                            </x-secondary-button>
                                        </form>

<!--                                        <a rel="{{$property->id}}" href="javascript:" class="index-btn-span delete">
                                            Удалить объявление
                                        </a>-->
                                    </div>
                                </div>
                            </div>
                            <div class="deal-section-left">
                                <div>&nbsp;</div>

                                <ul class="max-w-xl">
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
                                        @if($property->daily_rent)
                                            <h2 class="text-lg font-medium text-gray-900">
                                                Цена за сутки
                                            </h2>
                                        @else
                                            <h2 class="text-lg font-medium text-gray-900">
                                                Цена за 30 суток
                                            </h2>
                                        @endif

                                        <p class="mt-1 text-sm text-gray-600">
                                            {{$property->price_per_day}}₽
                                        </p>
                                    </li>

                                    <li class="dashboard-link">
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
                                    </li>
                                    <li class="dashboard-link">
                                        <h2 class="text-lg font-medium text-gray-900">
                                            Временная регистрация
                                        </h2>
                                        <div>
                                            @if($property->is_temporary_registration_possible)
                                                <p class="mt-1 text-sm text-gray-600">Возможна</p>
                                            @else
                                                <p class="mt-1 text-sm text-gray-600">Не возможна</p>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <x-property-deals :property="$property"></x-property-deals>

                    </div>
            @empty
                    <h1>У Вас пока нет объявлений</h1>
            @endforelse
        </div>
    </div>

@endsection


@push('js')
<script>

    let elements = document.querySelectorAll(".delete");
    elements.forEach((element, key) => {
        element.addEventListener('click', function (){
            const id = this.getAttribute('rel');
            if(confirm(`Подтвердите удаление объявления #${id}`)) {
                send(`/user/properties/${id}`).then( () => {
                    document.getElementById(id).remove();
                    console.log(send(`/user/properties/${id}`));
                });
            } else {
                alert("Вы отменили удаление объявления")
            }
        });
    });

    async function send(url) {
        console.log(url);
        let response = await fetch (url, {
            method:'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });
        let result = await response.json();
        return result.ok;
    }
</script>
@endpush









