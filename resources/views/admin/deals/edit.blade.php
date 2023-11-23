@extends('layouts/admin')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Редактор сделки</h1>
        @include('inc.message')
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Сделка {{ $deal->id }}
            </div>

            <form  method="post"
                   enctype="multipart/form-data"
                   action=" {{ route('admin.deals.update', $deal) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="property_id">ID объявления</label>
                    <input type="number"
                           name="property_id"
                           class="form-control"
                           id="property_id"
                           value="{{ $deal->property_id ?? old('property_id') }}">
                </div>
                <div class="form-group">
                    <label for="tenant_id">ID арендатора</label>
                    <input type="number"
                           name="tenant_id"
                           class="form-control"
                           id="tenant_id"
                           value="{{ $deal->tenant_id ?? old('tenant_id') }}">
                </div>
                <div class="form-group">
                    <label for="rent_starts_at">Начало аренды</label>
                    <input type="date"
                           name="rent_starts_at"
                           class="form-control"
                           id="rent_starts_at"
                           value="{{ $deal->rent_starts_at ?? old('rent_starts_at') }}">
                </div>
                <div class="form-group">
                    <label for="rent_ends_at">Конец аренды</label>
                    <input type="date"
                           name="rent_ends_at"
                           class="form-control"
                           id="rent_ends_at"
                           value="{{ $deal->rent_ends_at ?? old('rent_ends_at') }}">
                </div>
                <div class="form-group">
                    <label for="rent_costs">Стоимость</label>
                    <input type="number"
                           name="rent_costs"
                           class="form-control"
                           id="rent_costs"
                           value="{{ $deal->rent_costs ?? old('rent_costs') }}">
                </div>
                <div class="form-group">
                    <label for="guests">Гости</label>
                    <input type="number"
                           name="guests"
                           class="form-control"
                           id="guests"
                           value="{{ $deal->guests ?? old('guests') }}">
                </div>
                <div class="form-group">
                    <label for="registration">Регистрация</label>
                    <select class="form-control" name="registration" id="registration">
                        <option @if($deal->registration === 0) selected @endif>0</option>
                        <option @if($deal->registration === 1) selected @endif>1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status_id">Статус заявки</label>
                    <select class="form-control" name="status_id" id="status_id">
                        <option @if($deal->status_id === 1) selected @endif>1</option>
                        <option @if($deal->status_id === 2) selected @endif>2</option>
                        <option @if($deal->status_id === 3) selected @endif>3</option>
                        <option @if($deal->status_id === 4) selected @endif>4</option>
                        <option @if($deal->status_id === 5) selected @endif>5</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>

@endsection



