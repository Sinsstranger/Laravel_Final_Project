@extends('layouts.app')

@section('style')
    @parent
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset("assets/css/cabinet.css") }}">
@endsection

@section('content')

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @include('inc.message')

            <div class="flex justify-between items-center gap-4">
                <h1 class="text-lg font-medium text-gray-900 uppercase">
                    @if(empty($review))
                        НАПИСАТЬ
                    @else
                        ИЗМЕНИТЬ
                    @endif
                    ОТЗЫВ</h1>
            </div>

            <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg">

                    <h1 class="p-2 text-lg font-medium text-gray-900 review-address">
                        {{$property->title}} по адресу:
                        {{$property->address->country}},
                        {{$property->address->place}},
                        {{$property->address->street}},
                        {{$property->address->house_number}} -
                        {{$property->address-> flat_number}}
                    </h1>

                <form id="write-review" class="rv-back" method="post" enctype="multipart/form-data" action="
                @if(empty($review)) {{ route('review.store') }}
                @else {{ route('review.update', $review) }}
                @endif ">

                @csrf

                @if(isset($review)) @method('PUT')
                @else @method('POST')
                @endif

            <div class="p-2">
                <p class="p-2 text-lg font-medium text-gray-900">Ваша оценка: <span id="rate">&nbsp;</span></p>
                            <div class="rating p-2">
                                <div class="rating-wrap">
                                    <input class="rating-input" id="star-5" type="radio" name="rating" value="5">
                                    <label class="rating-ico fa fa-star-o fa-lg" for="star-5" title="Отлично"></label>
                                    <input class="rating-input" id="star-4" type="radio" name="rating" value="4">
                                    <label class="rating-ico fa fa-star-o fa-lg" for="star-4" title="Хорошо"></label>
                                    <input class="rating-input" id="star-3" type="radio" name="rating" value="3">
                                    <label class="rating-ico fa fa-star-o fa-lg" for="star-3" title="Удовлетворительно"></label>
                                    <input class="rating-input" id="star-2" type="radio" name="rating" value="2">
                                    <label class="rating-ico fa fa-star-o fa-lg" for="star-2" title="Плохо"></label>
                                    <input class="rating-input" id="star-1" type="radio" name="rating" value="1">
                                    <label class="rating-ico fa fa-star-o fa-lg" for="star-1" title="Ужасно"></label>
                                </div>
                            </div>
                        </div>

                        <div class="p-2 sm:p-8 bg-white sm:rounded-lg">
                            <label for="description" class="text-lg font-medium text-gray-900">Пожалуйста, поделитесь своими впечатлениями</label>
                            <textarea name="description" id="description" placeholder="Здесь вы можете описать все достоинства и возможные недостатки этого объекта недвижимости..."
                                class="d-block review-textarea" required>{{$review->description ?? old('description')}}</textarea>
                        </div>

                    <input type="hidden" name="property_id" value="{{ $property->id }}">

                <div class="p-2">
                    <input type="hidden" value="@if(empty($review))Опубликовать отзыв @else Сохранить изменения @endif" >
                    @if(empty($review))
                        <x-primary-button :type="'submit'">
                        Опубликовать
                        </x-primary-button>
                    @else
                        <x-primary-button :type="'submit'" >
                            Сохранить изменения
                        </x-primary-button>
                    @endif
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
@section('script')
    @parent
<script>

    //Вывод оценки числом
    let iElems = document.querySelectorAll('input');
    iElems.forEach(function (i) {
        i.addEventListener('click', function (event) {

            let r = document.getElementById('rate');
            r.innerText = event.target.value;
        });
    })

    //Валидация формы
    const form = document.getElementById('write-review');
    form.noValidate = true;

    form.addEventListener('submit', function(event) {
        if (!event.target.checkValidity()) {
            event.preventDefault();
            alert('Пожалуйста, заполните все пункты отзыва'); // error message
        }
    }, false);
</script>
@endsection
