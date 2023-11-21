

    @if($property->deal)

        <div class="sm:max-w-2xl" style="width: 100%; max-width: 50rem; margin: 0 0 0 10px;
            box-shadow: 0px 0px 14px 9px rgba(34, 60, 80, 0.2);">

            <div class="tab">

                <button class="tablinks defaultOpen" onclick="openTab(event,
                                            'NewDeals{{$property->id}}', {{$property->id}})">
                    Новые заявки
                </button>

                <button class="tablinks" onclick="openTab(event, 'DealsInProgress{{$property->id}}',
                                            {{$property->id}})">
                    Действующие заявки
                </button>

                <button class="tablinks" onclick="openTab(event, 'Archive{{$property->id}}',
                                            {{$property->id}})">
                    Архив
                </button>

                <button class="tablinks" onclick="openTab(event, 'dealsMessages{{$property->id}}',
                                            {{$property->id}})">
                    Сообщения
                </button>

            </div>

            {{--ДЕЙСТВУЮЩИЕ ЗАЯВКИ--}}

            <div id="DealsInProgress{{$property->id}}" class="tabcontent tabcontent{{$property->id}}">
                <h3>Действующие заявки</h3>

                <div class="table-responsive">

                    <table class="table table-striped table-sm" style="min-width: 300px!important;">
                        <thead>
                            <tr>

                                <th scope="col">Дата начала</th>
                                <th scope="col">Дата окончания</th>
                                <th scope="col">Количество гостей</th>
                                <th scope="col">Контакты</th>
                                <th scope="col">Действия</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($property->deal as $item)
                                @if($item->status_id === 2)
                                    <tr style="text-align: center!important">
                                        <td style="text-align: center!important">{{$item->rent_starts_at}}</td>
                                        <td style="text-align: center!important">{{$item->rent_ends_at}}</td>
                                        <td style="text-align: center!important">{{$item->guests}}</td>
                                        <td style="text-align: center!important; padding:20px 5px">{{$item->tenant->phone}}</td>
                                        <td style="display: flex">
                                            {{--<div class="formWrap">
                                                <form style="margin: 0 15px;" method="POST" enctype="multipart/form-data"
                                                      action="#">
                                                    @csrf
                                                    @method('POST')
                                                    <button class="btn btn-sm actionButton" style="color: cornflowerblue",
                                                            type="submit">
                                                       Завершить
                                                    </button>
                                                </form>
                                            </div>--}}

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

                                @else
                                    <tr>
                                        <td colspan="6">
                                            <span style="margin: 5px">Нет заявок</span>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                    {{--<div style="padding-right: 65px">
                        {{ $categories->links() }}
                    </div>--}}
                </div>
            </div>

            {{--НЕПОДТВЕРЖДЕННЫЕ/НОВЫЕ ЗАЯВКИ--}}

            <div id="NewDeals{{$property->id}}" class="tabcontent tabcontent{{$property->id}}">
                <h3>Новые заявки</h3>
                <div class="table-responsive">

                    <table class="table table-striped table-sm" style="min-width: 300px!important;">
                        <thead>
                            <tr>

                                <th scope="col">Дата начала</th>
                                <th scope="col">Дата окончания</th>
                                <th scope="col">Количество гостей</th>
                                <th scope="col">Контакты</th>
                                <th scope="col">Действия</th>

                            </tr>
                        </thead>
                        <tbody>

                        @foreach($property->deal as $item)
                            @if($item->status_id === 1)
                            <tr style="text-align: center!important">
                                <td style="text-align: center!important">{{$item->rent_starts_at}}</td>
                                <td style="text-align: center!important">{{$item->rent_ends_at}}</td>
                                <td style="text-align: center!important">{{$item->guests}}</td>
                                <td style="text-align: center!important; padding:20px 5px">{{$item->tenant->phone}}</td>
                                <td style="display: flex">
                                    {{--<div class="formWrap">
                                        <form style="margin: 0 15px;" method="POST" enctype="multipart/form-data"
                                              action="#">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-sm actionButton", style="color: mediumseagreen",
                                                    type="submit">
                                                Подтвердить
                                            </button>
                                        </form>
                                    </div>--}}

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

                                    {{--<div class="formWrap">
                                        <form style="margin: 0 15px;" method="POST" enctype="multipart/form-data"
                                              action="#" >
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-sm actionButton", style="color: indianred;", type="submit">
                                                Отклонить
                                            </button>

                                        </form>
                                    </div>--}}
                                </td>
                            </tr>
                            @else

                                <tr>
                                    <td colspan="6">
                                        <span style="margin: 5px">Нет заявок</span>
                                    </td>
                                </tr>

                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    {{--<div style="padding-right: 65px">
                        {{ $categories->links() }}
                    </div>--}}
                </div>

            </div>

            {{--АРХИВ ЗАЯВОК--}}

            <div id="Archive{{$property->id}}" class="tabcontent tabcontent{{$property->id}}">
                <h3>Архив</h3>

                <div class="table-responsive">

                    <table class="table table-striped table-sm" style="min-width: 300px!important;">
                        <thead>
                            <tr>

                                <th scope="col">Дата начала</th>
                                <th scope="col">Дата окончания</th>
                                <th scope="col">Количество гостей</th>
                                <th scope="col">Контакты</th>
    {{--                            <th scope="col">Действия</th>--}}

                            </tr>
                        </thead>

                        <tbody>

                        @foreach($property->deal as $item)
                            @if($item->status_id === 4 && 3)
                                <tr style="text-align: center!important">
                                    <td style="text-align: center!important">{{$item->rent_starts_at}}</td>
                                    <td style="text-align: center!important">{{$item->rent_ends_at}}</td>
                                    <td style="text-align: center!important">{{$item->guests}}</td>
                                    <td style="text-align: center!important; padding:20px 5px">{{$item->tenant->phone}}</td>
                                </tr>
                            @else

                                <tr>
                                    <td colspan="6">
                                        <span style="margin: 5px">Нет заявок</span>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    {{--<div style="padding-right: 65px">
                        {{ $categories->links() }}
                    </div>--}}
                </div>
            </div>

            <div id="dealsMessages{{$property->id}}" class="tabcontent tabcontent{{$property->id}}">
                <h3>Сообщения</h3>
            </div>
        </div>
    @else

    <h1 class="notDealsText">У этого объекта пока нет заявок</h1>

    @endif




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
