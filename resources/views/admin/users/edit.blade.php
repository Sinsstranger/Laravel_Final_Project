@extends('layouts/admin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Редактор пользователя</h1>
    @include('inc.message')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            {{ $user->name }}
        </div>
        <form  method="post" action="{{ route('admin.users.update',$user) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
            <div class="form-group">
                <label for="name">Юзернейм</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name')?? $user->name }}">
        @error('name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="first_name">Имя</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{ old('first_name')?? $user->first_name }}">
                @error('first_name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="last_name">Фамилия</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" value="{{ old('last_name')?? $user->last_name }}">
                @error('last_name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Почта</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email')?? $user->email }}">
        @error('email') <div id="validationServerUsernameFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="is_admin">Admin</label>
                <select class="form-control" name="is_admin" id="is_admin">
                    <option @selected(old('is_admin') === false || $user->is_admin === false ) value="0">false</option>
                    <option @selected(old('is_admin') === true || $user->is_admin === true) value="1">true</option>
                </select>
            </div>
            <div class="form-group">
                <label for="avatar">Аватарка</label>
                <img src="{{ $user->avatar }}" alt="avatar" width="80px">
                <input name="avatar" class="form-control form-control-sm  @error('avatar') is-invalid @enderror" id="avatar" type="file">
                @error('avatar')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <br>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>

@endsection
