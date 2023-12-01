@extends('layouts.public')
@section('title')
    @parentКаталог недвижимости
@endsection
@section('style')
    @parent
    <link rel="stylesheet" href="{{ asset("assets/css/object.css") }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous" />
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
                    sendFavourites(`/favourites/${dataset.id}/${dataset.action}`).then((data) => {
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

            async function sendFavourites(url) {
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
@section('script')
    @parent
    <script>

        document.addEventListener('DOMContentLoaded', () => {
                @foreach($properties as $property)
                    let ratarr{{ $property->id }} = [];

                    @foreach($property->reviews as $review)
                        ratarr{{ $property->id }}.push({{ $review->rating }});
                    @endforeach

                    if(ratarr{{ $property->id }}.length !== 0) {
                        const average{{ $property->id }} = getAverage(ratarr{{ $property->id }});

                        let star{{ $property->id }} = document.getElementById(`star{{ $property->id }}`);
                        star{{ $property->id }}.innerText = average{{ $property->id }}.toFixed(1);

                        let num{{ $property->id }} = document.getElementById(`numfeed{{ $property->id }}`);
                        num{{ $property->id }}.innerText = countFeedback(ratarr{{ $property->id }});

                    }
                    else {
                        let $star{{ $property->id }} = document.getElementById('star{{ $property->id }}');
                        $star{{ $property->id }}.setAttribute('style', "display:none;");

                        let num{{ $property->id }} = document.getElementById(`num{{ $property->id }}`);
                        num{{ $property->id }}.setAttribute('style', "display:none;");

                    }
            @endforeach
        })

        function getAverage(nums) {
            return nums.reduce((a, b) => (a + b)) / nums.length;
        }

        function countFeedback(nums) {
            if (nums.length === 1 || nums.length % 10 === 1) {
                return nums.length + ' отзыв';
            }
            else if ((nums.length > 1 && nums.length < 5) || (nums.length % 10 > 1 && nums.length % 10 < 5)) {
                return nums.length + ' отзыва';
            }
            else {
                return nums.length + ' отзывов';
                }
        }


    </script>
@endsection

