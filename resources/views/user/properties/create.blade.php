@extends('layouts/app')
@section('content')

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @include('inc.message')


        <form method="post"
              enctype="multipart/form-data"
              action=" @if(empty($property)) {{ route('user.properties.store') }}
                       @else {{ route('user.properties.update', $property) }}
                       @endif ">
                @csrf

                @if(isset($property)) @method('PUT')
                @else @method('POST')
                @endif

                <div class="card">

                    {{--<div class="card-body">
                        <h5 class="card-title">
                            <textarea name="title" class="form-control" id="exampleFormControlTextarea1" rows="3" required>
                                Наименование
                            </textarea>
                        </h5>
                    </div>--}}
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <label for="title" class="text-lg font-medium text-gray-900" >Наименование</label>
                                <input name="title" type="text" value = "{{$property->title ?? old('title')}}"
                                       class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                       shadow-sm mt-1 block w-full
                                       @error('title') is-invalid @enderror"
                                       id="title">
                                @error('title')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <label for="category_id" class="text-lg font-medium text-gray-900" >Категория</label>
                                <select name="category_id" id="category_id"
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                       shadow-sm mt-1 block w-full" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                @if(empty($property->category_id)) @selected(old('category_id'))@else @selected($property->category_id == $category->id) @endif>
                                             {{ $category->title }}
                                                 </option>
                                    @endforeach
                                </select>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <label for="number_of_rooms" class="text-lg font-medium text-gray-900"  >
                                    Количество комнат</label>
                                <input name="number_of_rooms" type="number" id="number_of_rooms"
                                       value = "{{ $property->number_of_rooms ?? old('number_of_rooms')}}"
                                       class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                       shadow-sm mt-1 block w-full
                                        @error('number_of_rooms') is-invalid @enderror" >
                                @error('number_of_rooms')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <label for="number_of_guests" class="text-lg font-medium text-gray-900">
                                    Количество возможных гостей</label>
                                <input name="number_of_guests" type="text" id="number_of_guests"
                                       value = "{{$property->number_of_guests ?? old('number_of_guests')}}"
                                       class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                       shadow-sm mt-1 block w-full
                                       @error('number_of_guests') is-invalid @enderror">
                                @error('number_of_guests')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror

                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <label for="description" class="text-lg font-medium text-gray-900">
                                    Описание</label>
                                <textarea name="description" id="description"
                                          class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                       shadow-sm mt-1 block w-full @error('description') is-invalid @enderror">
                                    {{$property->description ?? old('description')}}
                                </textarea>
                                @error('description')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <label for="price_per_day" class="text-lg font-medium text-gray-900">Цена за сутки</label>
                                <input name="price_per_day" id="price_per_day" type="number"
                                       value = "{{$property->price_per_day ?? old('price_per_day')}}"
                                       class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                           shadow-sm mt-1 block w-full @error('price_per_day') is-invalid @enderror">
                                @error('price_per_day')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <h1>Адрес:</h1>
                                <div class="mb-3">
                                    <label for="country" class="text-lg font-medium text-gray-900">Страна</label>
                                    <input name="country" type="text" id="country"
                                           value = "{{$property->address->country ?? old('country')}}"
                                           class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                           shadow-sm mt-1 block w-full @error('country') is-invalid @enderror"
                                           @if(!empty($property)) readonly @endif >
                                    @error('country')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="place" class="text-lg font-medium text-gray-900">Город/поселок</label>
                                    <input name="place" type="text" id="place"
                                           value = "{{$property->address->place ?? old('place')}}"
                                           class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                           shadow-sm mt-1 block w-full @error('place') is-invalid @enderror"
                                           @if(!empty($property)) readonly @endif>
                                    @error('place')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="street" class="text-lg font-medium text-gray-900">Улица</label>
                                    <input name="street" type="text" id="street"
                                           value = "{{$property->address->street ?? old('street')}}"
                                           class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                           shadow-sm mt-1 block w-full @error('street') is-invalid @enderror"
                                           @if(!empty($property)) readonly @endif>
                                    @error('street')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="house_number" class="text-lg font-medium text-gray-900">Дом</label>
                                    <input name="house_number" type="text" id="house_number"
                                           value = "{{$property->address->house_number ?? old('house_number')}}"
                                           class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                           shadow-sm mt-1 block w-full @error('house_number') is-invalid @enderror"
                                           @if(!empty($property)) readonly @endif>
                                    @error('house_number')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="flat_number" class="text-lg font-medium text-gray-900">Квартира</label>
                                    <input name="flat_number" type="text" id="flat_number"
                                           value = "{{$property->address->flat_number ?? old('flat_number')}}"
                                           class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                           shadow-sm mt-1 block w-full @error('flat_number') is-invalid @enderror"
                                           @if(!empty($property)) readonly @endif>
                                    @error('flat_number')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                    <label for="is_temporary_registration_possible" class="text-lg font-medium text-gray-900">
                                        Временная регистрация</label>
                                    <input name="is_temporary_registration_possible" type="checkbox" value="1"
                                           id="is_temporary_registration_possible"
                                           @if(!empty($property->is_temporary_registration_possible)) checked @endif>
                                </div>
                        </li>

                        <li class="list-group-item">
                                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                    <label for="daily_rent" class="text-lg font-medium text-gray-900">Посуточная аренда</label>
                                    <input name="daily_rent" type="checkbox" value="1" id="daily_rent"
                                           @if(!empty($property->daily_rent)) checked @endif >
                                </div>
                        </li>

                        <li class="list-group-item">
                                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                    <label for="photo" class="text-lg font-medium text-gray-900">Добавить фотографию</label>
                                    @if(!empty($property->photo))
                                        @foreach($property->photo as $photo)
                                            <img src="{{ $photo }}" width="100">
                                        @endforeach
                                    @endif
                                    <input name="photo[]" multiple  class="form-control form-control-sm" id="photo" type="file">
                                </div>
                        </li>
                    </ul>

                    <div class="card-body">

                        <x-primary-button>
                            @if(empty($property))Опубликовать объявление
                            @else Изменить данные @endif
                        </x-primary-button>

                    </div>

                    {{--<div class="card-body">
                        <button type="submit" class="card-link">Опубликовать объявление</button>
                    </div>--}}
                </div>
            </form>
        </div>
    </div>
@endsection
