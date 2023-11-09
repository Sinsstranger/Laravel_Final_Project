<div class="item">
    <div class="properties ftco-animate">
        <div class="img">
            <img src="assets/images/work-<?php echo(rand(1,9)); ?>.jpg" class="img-fluid" alt="Дом для аренды">
        </div>
        <div class="desc">
            <div class="d-flex pt-5">
                <div>
                    <h5 class="title"><a href="{{ route('properties.show', $property) }}">{{ $property->title }}</a>
                    </h5>
                </div>
                <div class="pl-md-4">
                    <h5 class="price">{{ $property->price_per_day}}₽</h5>
                </div>
            </div>
            <p class="h-info"><span class="location">
                    {{$property->address->country}}
                    {{$property->address->place}}</span>
            </p>
        </div>
    </div>
</div>
