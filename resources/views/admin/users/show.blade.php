@extends('layouts/admin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Карточка пользователя</h1>
    @include('inc.message')
    <div class="card mb-4">
        <div class="card-header">
            Имя
            {{ $user->name }}
            
        </div>
        <div class="card-header">
            
            Почта 
            {{ $user->email }}
        </div>
        
    </div>
    <div class="card mb-4">
        <div class="card-header">
            
            Объявления
        </div>
        <br
        <x-admin.cards-real :properties="$properties"/>
    </div>
</div>

@endsection