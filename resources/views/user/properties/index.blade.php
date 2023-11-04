@extends('layouts/app')
@section('content')

    <div class="container">
        <h1> Тут информация по всем объявлениям юзера</h1>
        <ul>
            @foreach($propertiesUser as $property)
                <li>{{ $property->title }}</li>
                <li><a href="{{ route('user.properties.edit', $property) }}"> Редактировать объявление</a></li>
            @endforeach
        </ul>
        <a href="{{ route('user.properties.create') }}"> Добавить объявление</a>
    </div>
@endsection
