<aside class="rent-section">
    <div class="container">
        <div class="heading-section">
            <h4>Хочу забронировать</h4></div>
        <form id="new-reservation" action="{{ route('user.deals.store') }}" method="post">
            @csrf
            <div>
                <p>Укажите даты <label  for="datepicker">заезда и выезда</label></p>
                @if($property->daily_rent)
                    <p class="condition">&nbsp;</p>
                @else
                    <p class="condition">Срок аренды - <b>от 30 суток</b></p>
                @endif
                <input type="text" name="rent_start_and_end" id="datepicker" class="form-control form-control-sm" placeholder="Выберите даты..." form="new-reservation" required />
            </div>
            <div>
                <p><label for="guests">Количество гостей</label></p>
                <input type="number" name="guests" id="guests" step="1" min="1" max="{{$property->number_of_guests}}" placeholder="0" form="new-reservation" required>
            </div>
            <div>
                @if($property->is_temporary_registration_possible)
                    <p class="rent-radio">Нужна временная регистрация</p>
                    <div class="form-check-rent">
                        <input class="form-check-input-rent" type="radio" name="registration" id="temporary_reg0" value="0" checked="" form="new-reservation">
                        <label class="form-check-label-rent" for="temporary_reg0">
                            Нет
                        </label>
                        <input class="form-check-input-rent" type="radio" name="registration" value="1" id="temporary_reg1" form="new-reservation">
                        <label class="form-check-label-rent" for="temporary_reg1">
                            Да
                        </label>
                    </div>
                @else
                    <input class="form-check-input-rent" type="radio" name="registration" id="temporary_reg0" value="0" checked="" form="new-reservation" hidden>
                    <label class="form-check-label-rent" for="temporary_reg0" hidden>
                        Нет
                    </label>
                @endif</div>
            <div class="rent-summary">
                <hr>
                <p id="result1">&nbsp;</p>
                <p id="result2">&nbsp;</p>
                @auth
                    <input type="hidden" name="tenant_id" value="{{ \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier() }}">
                    <input type="hidden" name="property_id" value="{{ $property->id }}">
                    <input type="submit" value="Забронировать" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#reservation" form="new-reservation">
                @endauth
            </div>
        </form>

    </div>
    @guest
        <div class="deal-form-popup">
            <div class="deal-form-popup-content p-3">
                <a href="{{ route('register') }}" class="btn btn-block btn-primary">Зарегистрируйтесь, чтобы забронировать</a>
            </div>
        </div>
    @endguest
</aside>
