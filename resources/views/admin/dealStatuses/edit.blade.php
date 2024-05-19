@extends('layouts/admin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Редактор категории</h1>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif

    @include('inc.message')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            {{-- {{ $dealStatus->name }} --}}
        </div>

        <form method="post"
        action="@if(empty($dealStatus)){{ route('admin.dealStatuses.store') }}
                @else{{ route('admin.dealStatuses.update', $dealStatus) }}
                @endif"
        enctype="multipart/form-data">

        @csrf

            @if (isset($dealStatus)) @method('PUT')
            @else @method('POST')
            @endif

            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $dealStatus->name ?? old('name') }}">
                {{-- @error('name') <div id="validationServerUsernameFeedback" class="invalid-feedback">{{ $message }}</div>@enderror --}}
            </div>
            <button type="submit" class="btn btn-success">Добавить</button>
        </form>
    </div>
</div>

@endsection
