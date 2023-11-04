@extends('layouts.public')
@section('content')
    <div>
    <h1>Обявление с ID: {{ $property->id }}</h1>
    <h3>{{ $property->title }}</h3>
</div>
@endsection

