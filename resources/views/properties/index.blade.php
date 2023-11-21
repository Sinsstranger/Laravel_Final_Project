@extends('layouts.public')
@section('title')
    @parentКаталог недвижимости
@endsection
@section('style')
    @parent
    <link rel="stylesheet" href="{{ asset("assets/css/object.css") }}">
@endsection
@section('content')

    <br><br><br>
    <section class="object-title object-title-catalog">
        <div class="container">
            <div class="header-object">
                <h2 class="mb-4 list-real">Каталог недвижимости</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Каталог недвижимости</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="property-content">
        <div class="container">
            <div class="row">
                <aside class="col-md-3">
                    <x-filter/>
                </aside>
                <main class="col-md-9">
                    <!--<header class="border-bottom mb-4 pb-3">
                            <div class="form-inline">
                                 <span class="mr-md-auto">найдено ? вариантов </span>
                                -    <select class="mr-2 form-control">
                                         <option>Latest items</option>
                                         <option>Trending</option>
                                         <option>Most Popular</option>
                                         <option>Cheapest</option>
                                     </select>
                                     <div class="btn-group">
                                         <a href="#" class="btn btn-outline-secondary" data-toggle="tooltip" title="" data-original-title="List view">
                                             <i class="fa fa-bars"></i></a>
                                         <a href="#" class="btn  btn-outline-secondary active" data-toggle="tooltip" title="" data-original-title="Grid view">
                                             <i class="fa fa-th"></i></a>
                                     </div
                            </div>
                        </header>>-->
                    <x-catalog :properties="$properties"/>
                    {{$properties->withQueryString()->links()}}
                </main>
            </div>

        </div>

    </section>
    @auth
        <script>
            const elements = document.querySelectorAll('.favourites_img');

            elements.forEach(element => {
                element.addEventListener("click", (event) => {
                    const dataset = event.target.dataset;
                    send(`/favorites/${dataset.id}/${dataset.action}`, dataset).then((data) => {
                        if (data === 'add') {
                            element.classList.remove('img_opacity');
                            element.dataset.action = 'remove';
                        } else if (data === 'remove') {
                            element.classList.add('img_opacity');
                            element.dataset.action = 'add';
                        }
                    });
                });
            });

            async function send(url) {
                const response = await fetch(url, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    method: 'POST',
                })

                return response.json();
            }
        </script>

    @endauth
@endsection

