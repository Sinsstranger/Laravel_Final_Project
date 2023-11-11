<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @forelse($properties as $property)
    <div class="col">
        <div class="card shadow-sm">
            <div>
                <img src="{{ $property->photo }}" class="img-fluid" alt="Дом для аренды">
            </div>
            <div class="card-body">
                <div class="d-flex pt-5">
                    <div>
                        <h5 class="title"><a href="">{{ $property->title }}</a>
                        </h5>
                    </div>
                    <div class="pl-md-4">
                        <h5 class="price">{{ $property->price_per_day}}₽</h5>
                    </div>
                </div>
                <p class="h-info"><span class="location">Москва</span></p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
        </div>
    </div>
    @empty
    Нет подходящих объектов недвижимости.
    @endforelse
    </div>
</div>
