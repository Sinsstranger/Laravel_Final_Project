<div class="item">
    <a href="{{ route('properties.show', $property) }}">
        <div class="properties ftco-animate">
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
        </div>
    </a>
</div>

