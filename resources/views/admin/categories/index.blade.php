@extends('layouts/admin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Категории</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Категории
        </div>
        <div class="box">
            <div class="table-scroll">
                <table>
                    <a href="#" type="button" class="btn btn-success" style="margin-bottom: 21px">Добавить</a>
                    <br>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Опции</th>
                        </tr>
                    </thead>
                </table>
                <div class="table-scroll-body">
                    <table>
                        <tbody>
                    @forelse($categories as $category)
                            <tr id="{{ $category->id }}">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td><a href="#" type="button" class="btn btn-success">Редактировать</a>
                                    <a href="#" type="button" class="btn btn-danger">Удалить</a></td>
                            </tr>
                    @empty
                            <tr>
                                <td colspan='4'>Записей нет</td>
                            </tr>
                    @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

