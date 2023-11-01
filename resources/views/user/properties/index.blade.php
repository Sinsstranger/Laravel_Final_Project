@extends('layouts/app')
@section('content')

    <div class="container">
        <h1> Тут информация по всем объявлениям юзера</h1>
        <ul>
            @foreach($propertiesUser as $property)
                <li>{{ $property->title }}</li>
            @endforeach
        </ul>
        <form>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">price_per_day</label>
                <input name="price_per_day" type="number" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">price_per_day</label>
                <input name="is_temporary_registration_possible" type="checkbox" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">price_per_day</label>
                <input name="is_temporary_registration_possible" type="checkbox" class="form-control" id="exampleFormControlInput1" >
            </div>
        </form>
    </div>
@endsection
