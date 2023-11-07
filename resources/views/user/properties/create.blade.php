@extends('layouts/app')
@section('content')
    <div class="container" style="display: flex;">
            <!doctype html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Card edit</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        </head>

        {{-- @foreach --}}
            <body class="p-3 m-0 border-0 bd-example">
                <div class="card" style="width: 23rem; margin-top: 30px;">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>
                <div class="card-body">
                    <h5 class="card-title"><textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">Заголовок</textarea></h5>
                    <p class="card-text"><textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">Some quick example text to build on the card title and make up the bulk of the card's content.</textarea></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Категория
                        <select name="category_id">
                        @foreach($categories as $category)
                            <option selected>{{ $category->title }}</option>
                        @endforeach
                    </select></li>
                    <li class="list-group-item">Описание
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </li>
                    <li class="list-group-item">
                        <label for="exampleFormControlInput1" class="form-label">Цена</label>
                        <input name="price_per_day" type="number" class="form-control" id="exampleFormControlInput1" >
                    </li>
                    <li class="list-group-item">
                        Адрес:
                        <select style="margin-left: 5px;" name="address_id">
                            <option>Адрес</option>
                        </select>
                    </li>
                    <li class="list-group-item">Добавить ранее сохранённое объявление
                        <select style="margin-top: 5px;" name="address_id">
                            <option>Категория квартиры</option>
                            <option>Адрес</option>
                        </select>
                    </li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Сохранить</a>
                    <a href="#" class="card-link">Отменить изменения</a>
                </div>
            </body>
        {{-- @endforeach --}}
    </html>
@endsection
