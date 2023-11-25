<div >

    {{--НЕПОДТВЕРЖДЕННЫЕ/НОВЫЕ ЗАЯВКИ--}}
    <button class="accordion">Заявки</button>
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

    <button class="accordion">Актуальное</button>
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
                    @if ($property->deal->contains('status_id', 2))
                        @foreach($property->deal as $item)
                            @if ($item->status_id === 2)
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

    <button class="accordion">Архив</button>
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
                        <td colspan="6">Нет отклонённых или завершённых бронирвоаний</td>
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
        <p>Здесь будут отзывы на аренду со статусом 4-Завершен</p>
    </div>
    </div>
<button onclick="topFunction()" id="myBtn" title="Go to top">Наверх</button>

@section('script')
    @parent
    <script src="{{ asset("assets/js/cabinet.js") }}"></script>
<script>

    function openTab(evt, tabName, propertyId) {

        let i, tabcontent, tablinks, defaultOpen;

        tabcontent = document.getElementsByClassName(`tabcontent${propertyId}`);
        console.log(tabcontent);

        for(i = 0; i < tabcontent.length; i++){
            tabcontent[i].style.display = "none";
        }

        document.getElementById(tabName).style.display = "block";

        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        evt.currentTarget.className += " active";
    }

    defaultOpen=document.getElementsByClassName("defaultOpen");

    for (let i = 0; i < defaultOpen.length; i++) {
        defaultOpen[i].click();
    }

    {{--Скрипт календаря--}}
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

    /* let dealPopUP = document.querySelectorAll(".dealModalWindow");

     const dealLinkPopUP = document.querySelectorAll('.showDeals');

     document.addEventListener('DOMContentLoaded', () => {
         dealPopUP.forEach((popUp) => {
          popUp.style.display = 'none';
         });
     });

     dealLinkPopUP.forEach((link) => {
         link.addEventListener('click', () => {
             let id = link.dataset.deal;
             let dealPopUPClass = document.querySelector(`.dealModalElement${id}`);
             if(dealPopUPClass.style.display == "block") {
                 dealPopUPClass.style.display="none";
             } else {
                 dealPopUPClass.style.display="block";
             }
         })
     })*/

</script>
@endsection

