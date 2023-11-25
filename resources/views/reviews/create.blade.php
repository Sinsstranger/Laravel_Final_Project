@extends('layouts.app')
@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        @include('inc.message')
        {{-- {{ dd($property[0]->title) }} --}}
        Отзыв на объект: {{ $property->title }}

        <form method="post" enctype="multipart/form-data" action="
            @if(empty($review)) {{ route('review.store') }}
            @else {{ route('review.update', $review) }}
            @endif ">

            @csrf

            @if(isset($review)) @method('PUT')
            @else @method('POST')
            @endif

            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Оценка
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <label for="rating" class="text-lg font-medium text-gray-900">
                                1
                                <input type="radio" name="rating" value="1">
                            </label>
                            <label for="rating" class="text-lg font-medium text-gray-900">
                                2
                                <input type="radio" name="rating" value="2">
                            </label>
                            <label for="rating" class="text-lg font-medium text-gray-900">
                                3
                                <input type="radio" name="rating" value="3">
                            </label>
                            <label for="rating" class="text-lg font-medium text-gray-900">
                                4
                                <input type="radio" name="rating" value="4">
                            </label>
                            <label for="rating" class="text-lg font-medium text-gray-900">
                                5
                                <input type="radio" name="rating" value="5">
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <label for="description" class="text-lg font-medium text-gray-900">Отзыв</label>
                            <textarea name="description" id="description" cols="70" rows="10"
                                class="d-block">{{$review->description ?? old('description')}}</textarea>
                        </div>
                    </li>
                    <input type="hidden" name="property_id" value="{{ $property->id }}">
                </ul>
                <div class="card-body">
                    <input type="submit" value="@if(empty($review))Опубликовать отзыв @else Сохранить изменения @endif" class="btn btn-outline-primary">
                    {{-- <x-primary-button>
                        @if(empty($review))Опубликовать отзыв @else Сохранить изменения @endif
                    </x-primary-button> --}}
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
