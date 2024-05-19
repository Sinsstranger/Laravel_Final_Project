@extends('layouts/admin')
@section('title')
    @parent Карточка сообщения
@endsection
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Карточка сообщения</h1>
        @include('inc.message')
        <div class="card mb-4">
            <div class="card-header">
                ID -
                {{ $feedback->id }}
            </div>
            <div class="card-header">
                Имя -
                {{ $feedback->first_name }}
            </div>
            <div class="card-header">
                Фамилия -
                {{ $feedback->last_name }}
            </div>
            <div class="card-header">
                Почта -
                {{ $feedback->email }}
            </div>
            <div class="card-header">
                Телефон -
                {{ $feedback->phone }}
            </div>
            <div class="card-header">
                Сообщение -
                {{ $feedback->message }}
            </div>
        </div>
    </div>

@endsection

