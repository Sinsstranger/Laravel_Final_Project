<div>

    {{--НЕПОДТВЕРЖДЕННЫЕ/НОВЫЕ ЗАЯВКИ--}}
    <button class="accordion btn-with-counter">
        <div class="btn-content">
            <span>На рассмотрении</span>
            @if ($property->deal->contains('status_id', 1))
                <div class = "counter">
                    {{$property->deal->countBy('status_id',1)->first()}}
                </div>
            @endif
        </div>
    </button>
    <div class="panel">
        <div class="table-responsive">

            <table class="table table-striped table-sm" style="min-width: 300px!important;">
                <thead>
                <tr>
                    <th scope="col">Дата заезда</th>
                    <th scope="col">Дата выезда</th>
                    <th scope="col">Гости</th>
                    <th scope="col">Регистрация</th>
                    <th scope="col">Контакты</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                @if ($property->deal->contains('status_id', 1))
                    @foreach($property->deal as $item)
                        @if ($item->status_id === 1)
                            <tbody>
                            <tr style="text-align: center!important">
                                <td style="text-align: center!important">{{$item->rent_starts_at}}</td>
                                <td style="text-align: center!important">{{$item->rent_ends_at}}</td>
                                <td style="text-align: center!important">{{$item->guests}}</td>
                                @if($item->registration === 1)
                                    <td style="text-align: center!important">Да</td>
                                @else
                                    <td style="text-align: center!important">Нет</td>
                                @endif
                                <td style="text-align: center!important; padding:20px 5px"><p>{{$item->tenant->first_name}}&nbsp;{{$item->tenant->last_name}},</p><p>{{$item->tenant->phone}}</p></td>
                                <td style="display: flex">

                                    <div class="formWrap">
                                        <form method="POST" enctype="multipart/form-data"
                                              action="{{ route('user.deals.update', $item) }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status_id" value="2">
                                            <button class="btn btn-sm actionButton" style="color: mediumseagreen",
                                                    type="submit">
                                                Подтвердить
                                            </button>
                                        </form>
                                    </div>

                                    <div class="formWrap">
                                        <form method="POST" enctype="multipart/form-data"
                                              action="{{ route('user.deals.update', $item) }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status_id" value="3">
                                            <button class="btn btn-sm actionButton" style="color: indianred;",
                                                    type="submit">
                                                Отклонить
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        @endif
                    @endforeach
                @else
                    <td colspan="6">Нет заявок на аренду</td>
               @endif
            </table>
        </div>
    </div>

        {{--ДЕЙСТВУЮЩИЕ ЗАЯВКИ--}}

    <button class="accordion btn-with-counter">
        <div class="btn-content">
            <span>Актуальное</span>
            @if ($property->deal->contains('status_id', 2))
                <div class = "counter">
                    {{$property->deal->countBy('status_id')[2]}}
                </div>
            @endif
        </div>
    </button>
    <div class="panel">

            <div class="table-responsive">

                <table class="table table-striped table-sm" style="min-width: 300px!important;">
                    <thead>
                    <tr>
                        <th scope="col">Дата заезда</th>
                        <th scope="col">Дата выезда</th>
                        <th scope="col">Гости</th>
                        <th scope="col">Регистрация</th>
                        <th scope="col">Контакты</th>
                        <th scope="col" style="text-align: center;">
                            Действия</th>
                    </tr>
                    </thead>

                    @if ($property->deal->contains('status_id', 2))

                        @foreach($property->deal as $item)
                            @if ($item->status_id === 2)
                            <tbody>

                            <tr style="text-align: center!important">
                                <td style="text-align: center!important">{{$item->rent_starts_at}}</td>
                                <td style="text-align: center!important">{{$item->rent_ends_at}}</td>
                                <td style="text-align: center!important">{{$item->guests}}</td>
                                @if($item->registration > 0)
                                    <td style="text-align: center!important">Да</td>
                                @else
                                    <td style="text-align: center!important">Нет</td>
                                @endif
                                <td style="text-align: center!important; padding:20px 5px"><p>{{$item->tenant->first_name}}&nbsp;{{$item->tenant->last_name}},</p><p>{{$item->tenant->phone}}</p></td>
                                <td style="display: flex">

                                        <div class="formWrap">
                                            <form style="display: flex; justify-content: center;" method="POST"
                                                enctype="multipart/form-data"
                                                action="{{ route('user.deals.update', $item) }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status_id" value="4">
                                                <button class="btn btn-sm actionButton" style="color: cornflowerblue",
                                                        type="submit">
                                                    Завершить
                                                </button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                            @endif
                        @endforeach
                    @else
                        <td colspan="6">Нет подтверждённых заявок или действующей аренды</td>
                    @endif
                </table>
            </div>
    </div>

        {{--АРХИВ ЗАЯВОК--}}

    <button class="accordion">
        Архив
    </button>
    <div class="panel">

            <div class="table-responsive">

                <table class="table table-striped table-sm" style="min-width: 300px!important;">
                    <thead>
                    <tr>
                        <th scope="col">Дата заезда</th>
                        <th scope="col">Дата выезда</th>
                        <th scope="col">Гости</th>
                        <th scope="col">Регистрация</th>
                        <th scope="col">Контакты</th>
                        <th scope="col">Статус</th>
                    </tr>
                    </thead>
                    @if ($property->deal->contains('status_id', 3) || $property->deal->contains('status_id', 4))
                        @foreach($property->deal as $item)
                            @if ($item->status_id === 3 && 4)
                            <tbody>
                            <tr style="text-align: center!important">
                                <td style="text-align: center!important">{{$item->rent_starts_at}}</td>
                                <td style="text-align: center!important">{{$item->rent_ends_at}}</td>
                                <td style="text-align: center!important">{{$item->guests}}</td>
                                @if($item->registration === 1)
                                    <td style="text-align: center!important">Да</td>
                                @else
                                    <td style="text-align: center!important">Нет</td>
                                @endif
                                <td style="text-align: center!important; padding:20px 5px"><p>{{$item->tenant->first_name}}&nbsp;{{$item->tenant->last_name}},</p><p>{{$item->tenant->phone}}</p></td>
                                @if($item->status_id === 4)
                                    <td style="text-align: center!important">Завершена</td>
                                @else
                                    <td style="text-align: center!important; color: indianred">Отклонена</td>
                                @endif
                            </tr>
                            </tbody>
                            @endif
                        @endforeach
                    @else
                        <td colspan="6">Нет отклонённых или завершённых бронирований</td>
                    @endif
                </table>
            </div>
    </div>

        {{--Календарь--}}
    <button class="accordion">Календарь занятости</button>
    <div class="panel">
            <p> Здесь отображаются актуальные и завершённые бронирования</p>
            <input id="datepicker{{$property->id}}" hidden />
        </div>

    <button class="accordion">Отзывы</button>
    <div class="panel">
        <div class="review-body">
            @if(($property->reviews)->isNotEmpty())
                @foreach($property->reviews as $review)
                    <div class="review-header">
                        <div class="review-data">
                            <h6>{{ $review->user->name }}</h6>
                        </div>
                        <p class="dates">{{ $review->updated_at ?? $review->created_at  }}</p>
                    </div>
                    <div class="review-data">

                        <div class="stars">
                            <i id="{{ $property->id }}star1{{ $loop->index }}" class="fas fa-star"></i>
                            <i id="{{ $property->id }}star2{{ $loop->index }}" class="fas fa-star"></i>
                            <i id="{{ $property->id }}star3{{ $loop->index }}" class="fas fa-star"></i>
                            <i id="{{ $property->id }}star4{{ $loop->index }}" class="fas fa-star"></i>
                            <i id="{{ $property->id }}star5{{ $loop->index }}" class="fas fa-star"></i>
                        </div>

                        <p class="dates"> Даты проживания:<!--дата заезда--> 2023-08-09 – 2023-09-15<!--дата выезда--></p>
                    </div>
                    <p>{{ $review->description }}</p>
                    <hr>
                @endforeach
            @else
                <p>У этого объекта недвижимости пока нет отзывов.</p>
            @endif
        </div>

    </div>
</div>

<x-scroll-to-top-button></x-scroll-to-top-button>
@section('script')
    @parent
    <script src="{{ asset("assets/js/cabinet.js") }}"></script>
    <script>
        //Звёзды рейтинга

    @foreach($property->reviews as $review)
        document.addEventListener('DOMContentLoaded', () => {

            const rs = document.querySelectorAll('i');
            rs.forEach(() => {
                let rate{{ $loop->index }} = {{$review->rating}};
                for (let s = 1; s <= rate{{ $loop->index }}; s++) {
                    let $star = document.getElementById(`{{ $property->id }}star${s}{{ $loop->index }}`);
                    $star.classList.add('golden');
                }
            });
        });
    @endforeach
    <!--Скрипт календаря-->

        const DateTime{{$property->id}} = easepick.DateTime;
        books{{$property->id}} = [];
        bookedDates{{$property->id}} = [];
        @foreach($property->deal as $item)
            @if($item->status_id === 2 || $item->status_id === 4)
            startat = new Date("{{$item->rent_starts_at}}");
        startat = startat.getFullYear() + "-" + (startat.getMonth() + 1).toString().padStart(2, "0") + "-" + startat.getDate().toString().padStart(2, "0");

        endat = new Date("{{$item->rent_ends_at}}");
        endat = endat.getFullYear() + "-" + (endat.getMonth() + 1).toString().padStart(2, "0") + "-" + endat.getDate().toString().padStart(2, "0");
        booksmini = [startat,endat];
        //console.log(booksmini);
        books{{$property->id}}.push(booksmini);
        //console.log(books);
        bookedDates{{$property->id}} = books{{$property->id}}.map(d => {
            if (d instanceof Array) {
                const startat = new DateTime{{$property->id}}(d[0], 'YYYY-MM-DD');
                const endat = new DateTime{{$property->id}}(d[1], 'YYYY-MM-DD');

                return [startat, endat];
            }
        });
        @endif
        @endforeach

        const picker{{$property->id}} = new easepick.create({
            element: document.getElementById('datepicker{{$property->id}}'),
            zIndex: 10,
            lang: "ru-RU",
            grid: 2,
            calendars: 2,
            inline: true,
            css: [
                'https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.css',
                'https://easepick.com/css/demo_hotelcal.css',
                href="{{ asset("assets/css/object.css") }}",
            ],
            plugins: ["AmpPlugin", 'LockPlugin', "KbdPlugin"],
            LockPlugin: {
                minDate: new Date(),
                minDays: 2,
                inseparable: true,
                filter(date, picked) {
                    if (picked.length === 1) {
                        const incl = date.isBefore(picked[0]) ? '[)' : '(]';
                        return !picked[0].isSame(date, 'day') && date.inArray(bookedDates{{$property->id}}, incl);
                    }
                    return date.inArray(bookedDates{{$property->id}}, '[)');
                },
            },
            AmpPlugin: {
                dropdown: {
                    months: true,
                    years: true,
                    minYear: 2023,
                    maxYear: 2030
                }
            }
        })
    </script>
@endsection
