@extends('layouts/app')

@section('style')
    @parent
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset("assets/css/cabinet.css") }}">
@endsection

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @include('inc.message')

            <div class="flex justify-between items-center gap-4">
                <h1 class="text-lg font-medium text-gray-900 uppercase">Мои бронирования</h1>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg ">

                <button class="accordion btn-with-counter">
                    <div class="btn-content">
                        <span>Заявки</span>
                        @if ($deals->contains('status_id', 1))
                            <div class = "counter">
                                {{$deals->countBy('status_id')[1]}}
                            </div>
                        @endif
                    </div>
                </button>
                <div class="panel">
                    @if ($deals->contains('status_id', 1))
                        @foreach($deals as $deal)
                            @if ($deal->status_id === 1)
                                <div class="rent-section shadow">

                                    <x-deals-card :deal="$deal"></x-deals-card>

                                    <div></div>
                                    <div class="flex flex-end items-center gap-4 cabinet-index-btn">
                                        <form method="post" action="{{ route('user.deals.destroy', $deal) }}">
                                            @csrf
                                            @method('DELETE')
                                            <x-secondary-button :type="'submit'" >
                                                <span class="index-btn-span">Удалить заявку</span>
                                            </x-secondary-button>
                                        </form>
                                    </div>

                                </div>
                            @endif
                        @endforeach
                    @else
                        <p>У вас нет заявок на аренду</p>
                    @endif
                </div>

                <button class="accordion btn-with-counter">
                    <div class="btn-content">
                        <span>Актуальное</span>
                        @if ($deals->contains('status_id', 2))
                            <div class = "counter">
                                {{$deals->countBy('status_id')[2]}}
                            </div>
                        @endif
                    </div>
                </button>
                    <div class="panel">
                        @if ($deals->contains('status_id', 2))

                            @foreach($deals as $deal)
                                @if ($deal->status_id === 2)
                                    <div class="rent-section shadow">

                                        <x-deals-card :deal="$deal"></x-deals-card>

                                        <div class="flex items-center gap-4 cabinet-index-btn">
                                            <x-secondary-button>
                                                <a href="{{ route('chat.create', $deal->property->user_id ) }}">Написать сообщение</a>
                                            </x-secondary-button>

                                            <form method="post" action="{{ route('review.create') }}">
                                                @csrf
                                                <input type="hidden" name="property_id" value="{{ $deal->property->id }}">
                                                <x-primary-button :type="'submit'" class="index-rev-btn"><span class="index-btn-span">Оставить отзыв</span>
                                                </x-primary-button>
                                            </form>
                                        </div>

                                        <div class="flex items-center gap-4 cabinet-index-btn">
                                            @if(($deal->rent_ends_at <= now() && $deal->status_id == 4) || $deal->status_id == 4 || $deal->status_id == 3)
                                                <form method="post" action="{{ route('user.deals.destroy', $deal) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                        <x-secondary-button :type="'submit'" >
                                                            <span class="index-btn-span">Удалить бронирование</span>
                                                        </x-secondary-button>
                                                </form>
                                            @endif

                                            @if($deal->rent_ends_at > now() && $deal->status_id != 4 && $deal->status_id > 1)
                                                <form method="post" action="{{ route('user.deals.update', $deal) }}">
                                                    @csrf
                                                    @method('PUT')
                                                        <input type="hidden" name="status_id" value="4">
                                                            <x-secondary-button :type="'submit'" >
                                                                <span class="index-btn-span">Завершить досрочно</span>
                                                            </x-secondary-button>
                                                </form>
                                            @endif

                                                <x-primary-button>
                                                    <a href="{{ route('properties.show', $deal->property) }}">Забронировать повторно</a>
                                                </x-primary-button>
                                        </div>

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
                                @if($deal->status_id === 3 || $deal->status_id === 4)
                                    <div class="rent-section shadow">

                                        <x-deals-card :deal="$deal"></x-deals-card>

                                        <div class="flex items-center gap-4 cabinet-index-btn">
                                            <x-secondary-button>
                                                <a href="#">Написать cсообщение</a>
                                            </x-secondary-button>

                                            <form method="post" action="{{ route('review.create') }}">
                                                @csrf
                                                <input type="hidden" name="property_id" value="{{ $deal->property->id }}">
                                                <x-primary-button :type="'submit'" class="index-rev-btn"><span class="index-btn-span">Оставить отзыв</span>
                                                </x-primary-button>
                                            </form>
                                        </div>

                                        <div class="flex items-center gap-4 cabinet-index-btn">
                                            <form method="post" action="{{ route('user.deals.destroy', $deal) }}">
                                                @csrf
                                                @method('DELETE')
                                                <x-secondary-button :type="'submit'" >
                                                    <span class="index-btn-span">Удалить бронирование</span>
                                                </x-secondary-button>
                                            </form>

                                            <x-primary-button>
                                                <a href="{{ route('properties.show', $deal->property) }}">Забронировать повторно</a>
                                            </x-primary-button>
                                        </div>
                                    </div>
                               @endif
                            @endforeach
                        @else
                            <p>У вас пока нет отклонённых или завершённых бронирований</p>
                        @endif
                    </div>

                <button class="accordion">Отзывы</button>
                <div class="panel">
                    @forelse ($reviews as $review)
                    <div class="review-body">
                        <div class="review-header">
                            <div class="review-data">
                                <a href="{{ route('properties.show', $review->property) }}"><h1 class="font-medium uppercase">{{ $review->property->title }}</h1></a>
                                <div class="stars">
                                    <i id="{{ $review->property->id }}star1{{ $loop->index }}" class="fas fa-star"></i>
                                    <i id="{{ $review->property->id }}star2{{ $loop->index }}" class="fas fa-star"></i>
                                    <i id="{{ $review->property->id }}star3{{ $loop->index }}" class="fas fa-star"></i>
                                    <i id="{{ $review->property->id }}star4{{ $loop->index }}" class="fas fa-star"></i>
                                    <i id="{{ $review->property->id }}star5{{ $loop->index }}" class="fas fa-star"></i>
                                </div>
                                <p><b>{{ $review->rating }}</b></p>
                            </div>
                            <p class="dates">{{ $review->created_at }}</p>
                        </div>
                        <div class="review-data">
                            <p class="font-medium text-gray-900">{{ $review->property->address->place }},
                                {{ $review->property->address->street }},
                                {{ $review->property->address->house_number }},
                                {{ $review->property->address->flat_number }}
                            </p>

                        </div>
                        <p>{{  $review->description  }}</p>
                        <hr>
                    </div>
                    @empty
                    <p>Вы пока не оставляли отзывы.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <x-scroll-to-top-button></x-scroll-to-top-button>
  </div>
@endsection
@section('script')
    @parent
    <script src="{{ asset("assets/js/cabinet.js") }}"></script>
    <script>
        //Звёзды рейтинга

        @foreach($reviews as $review)
        document.addEventListener('DOMContentLoaded', () => {

            const rs = document.querySelectorAll('i');
            rs.forEach(() => {
                let rate{{ $loop->index }} = {{$review->rating}};
                for (let s = 1; s <= rate{{ $loop->index }}; s++) {
                    let $star = document.getElementById(`{{ $review->property->id }}star${s}{{ $loop->index }}`);
                    $star.classList.add('golden');
                }
            });
        });
        @endforeach
    </script>
@endsection
