@extends('layouts/admin')
@section('title')
    @parent @if(empty($category)) Создатель категорий
    @else Редактор категорий @endif
@endsection
@section('content')
    <div class="container-fluid px-4">
        @if(empty($category)) <h1 class="mt-4">Создатель категорий</h1>
        @else <h1 class="mt-4">Редактор категорий</h1> @endif
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif

        @include('inc.message')
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                @if(empty($category)) Название
                @else {{ $category->title }} @endif
            </div>

            <form  method="post"
                   enctype="multipart/form-data"
                   action=" @if(empty($category)) {{ route('admin.categories.store') }}
                   @else {{ route('admin.categories.update', $category) }}
                   @endif ">

                @csrf

                @if(isset($category)) @method('PUT')
                @else @method('POST')
                @endif

                <div class="form-group">
                    <label for="title">Категория</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           id="title"
                           value="{{ $category->title ?? old('title') }}">
                </div>
                <br>
                <button type="submit" class="btn btn-success">@if(empty($category)) Create
                    @else Update @endif</button>
            </form>
        </div>
    </div>

@endsection

