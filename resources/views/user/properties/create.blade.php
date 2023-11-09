@extends('layouts/app')
@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <form method="post" enctype="multipart/form-data" action="{{ route('user.properties.store') }}">
                @csrf
                <div class="card">
{{--                    <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>--}}
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
                                <input name="title" type="text" value = "{{old('title')}}"
                                       class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                       shadow-sm mt-1 block w-full" id="title" required >
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
                                            @selected (old('category->id') == $category->id)>{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <label for="number_of_rooms" class="text-lg font-medium text-gray-900"  >
                                    Количество комнат</label>
                                <input name="number_of_rooms" type="number" id="number_of_rooms"
                                       value = "{{old('number_of_rooms')}}"
                                       class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                       shadow-sm mt-1 block w-full" required >
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <label for="number_of_guests" class="text-lg font-medium text-gray-900">
                                    Количество возможных гостей</label>
                                <input name="number_of_guests" type="text" id="number_of_guests"
                                       value = "{{old('number_of_guests')}}"
                                       class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                       shadow-sm mt-1 block w-full" required >
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <label for="description" class="text-lg font-medium text-gray-900">
                                    Описание</label>
                                <textarea name="description" id="description"
                                          class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                       shadow-sm mt-1 block w-full" required >
                                    {{old('description')}}
                                </textarea>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <label for="price_per_day" class="text-lg font-medium text-gray-900">Цена за сутки</label>
                                <input name="price_per_day" id="price_per_day" type="number"
                                       value = "{{old('price_per_day')}}"
                                       class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                           shadow-sm mt-1 block w-full" required >
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <h1>Адрес:</h1>
                                <div class="mb-3">
                                    <label for="country" class="text-lg font-medium text-gray-900">Страна</label>
                                    <input name="country" type="text" id="country"
                                           value = "{{old('country')}}"
                                           class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                           shadow-sm mt-1 block w-full" required >
                                </div>
                                <div class="mb-3">
                                    <label for="place" class="text-lg font-medium text-gray-900">Город/поселок</label>
                                    <input name="place" type="text" id="place"
                                           value = "{{old('place')}}"
                                           class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                           shadow-sm mt-1 block w-full" required >
                                </div>
                                <div class="mb-3">
                                    <label for="street" class="text-lg font-medium text-gray-900">Улица</label>
                                    <input name="street" type="text" id="street"
                                           value = "{{old('street')}}"
                                           class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                           shadow-sm mt-1 block w-full" required >
                                </div>
                                <div class="mb-3">
                                    <label for="house_number" class="text-lg font-medium text-gray-900">Дом</label>
                                    <input name="house_number" type="text" id="house_number"
                                           value = "{{old('house_number')}}"
                                           class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                           shadow-sm mt-1 block w-full" required >
                                </div>
                                <div class="mb-3">
                                    <label for="flat_number" class="text-lg font-medium text-gray-900">Квартира</label>
                                    <input name="flat_number" type="text" id="flat_number"
                                           value = "{{old('flat_number')}}"
                                           class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                                           shadow-sm mt-1 block w-full" required >
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                    <label for="is_temporary_registration_possible" class="text-lg font-medium text-gray-900">
                                        Временная регистрация</label>
                                    <input name="is_temporary_registration_possible" type="checkbox" value="1"
                                           id="is_temporary_registration_possible" >
                                </div>
                        </li>>

                        <li class="list-group-item">
                                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                    <label for="daily_rent" class="text-lg font-medium text-gray-900">Посуточная аренда</label>
                                    <input name="daily_rent" type="checkbox" value="1" id="daily_rent"  >
                                </div>
                        </li>

                        <li class="list-group-item">
                                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                    <label for="photo" class="text-lg font-medium text-gray-900">Добавить фотографию</label>
                                    <input name="photo" class="form-control form-control-sm" id="photo" type="file">
                                </div>
                        </li>
                    </ul>

                    <div class="card-body">
                        <x-primary-button>Опубликовать объявление</x-primary-button>
                    </div>

                    {{--<div class="card-body">
                        <button type="submit" class="card-link">Опубликовать объявление</button>
                    </div>--}}
                </div>
            </form>
        </div>
    </div>
@endsection
