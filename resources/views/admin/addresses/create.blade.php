@extends('layouts/admin')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Адрес</h1>
        @include('inc.message')
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                @if(empty($address)) Адрес
                @else {{ $address->id }} @endif
            </div>

            <form  method="post"
                   enctype="multipart/form-data"
                   action=" @if(empty($address)) {{ route('admin.addresses.store') }}
                   @else {{ route('admin.addresses.update', $address) }}
                   @endif ">

                @csrf

                @if(isset($address)) @method('PUT')
                @else @method('POST')
                @endif

                <div class="form-group">
                    <label for="country">Страна</label>
                    <input type="text"
                           name="country"
                           class="form-control"
                           id="country"
                           value="{{ $address->country ?? old('country') }}">
                </div>
                <div class="form-group">
                    <label for="place">Населенный пункт</label>
                    <input type="text"
                           name="place"
                           class="form-control"
                           id="place"
                           value="{{ $address->place ?? old('place') }}">
                </div>
                <div class="form-group">
                    <label for="street">Улица</label>
                    <input type="text"
                           name="street"
                           class="form-control"
                           id="street"
                           value="{{ $address->street ?? old('street') }}">
                </div>
                <div class="form-group">
                    <label for="house_number">Номер дома</label>
                    <input type="number"
                           name="house_number"
                           class="form-control"
                           id="house_number"
                           value="{{ $address->house_number ?? old('house_number') }}">
                </div>
                <div class="form-group">
                    <label for="flat_number">Номер квартиры</label>
                    <input type="number"
                           name="flat_number"
                           class="form-control"
                           id="flat_number"
                           value="{{ $address->flat_number ?? old('flat_number') }}">
                </div>
                <br>
                <button type="submit" class="btn btn-success">@if(empty($address)) Create
                    @else Update @endif</button>
            </form>
        </div>
    </div>

@endsection


