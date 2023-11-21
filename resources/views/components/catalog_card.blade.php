<div class="item">

    <div class="properties ftco-animate">
        @auth
            @if(!is_null($property->fav_property_id))
                <img src="assets/images/favourites.png" class="favourites_img" data-id="{{ $property->id}}" data-action="remove">
            @else
               <img src="assets/images/favourites.png" class="favourites_img img_opacity" data-id="{{ $property->id}}" data-action="add">
            @endif
        @endauth
        <a href="{{ route('properties.show', $property) }}">
            <div class="img">
                <img src="assets/images/work-@php echo(rand(1,9)) @endphp.jpg" class="img-fluid" alt="Дом для аренды">
            </div>
            <div class="desc">
                <div class="d-grid pt-5">
                    <div class="desc-price">
                        <h5 class="title">{{ $property->title }}</h5>
                        <h5 class="price">{{ $property->price_per_day}}₽</h5>
                    </div>
                    <div class="desc-number">
                        <img src="assets/images/guests.png" alt="Гости" title="Количество гостей">
                        <p>{{$property->number_of_guests}}</p>
                    </div>
                    <div class="desc-number">
                        <img src="assets/images/rooms.png" alt="Комнаты" title="Количество комнат">
                        <p>{{$property->number_of_rooms}}</p>
                    </div>
                </div>
                <p class="h-info"><span class="location">
                        {{$property->address->country}},
                        {{$property->address->place}}</span>
                </p>
            </div>
        </a>
    </div>

</div>

