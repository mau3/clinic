@extends('layouts.default')

@section('content')
    <title>Add new position</title>
    <form method="POST" action="/admin/addPosition">
        {!! csrf_field() !!}

        <div class="container">
                <h2 class="form-signin-heading">Введите данные для добавления</h2>
                <div class = "col-md-4">
                    <label for="InputName">Наименование должности</label>
                    <input id = "InputName" type="name" name="name" class="form-control" placeholder="Введите наименование"  required autofocus  >

                    <label for="InputDescription">Описание должности</label>
                    <input id = "InputDescription" type="description" name="description" class="form-control" placeholder="Введите описание" required autofocus>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Добавить должность</button>
                </div>
        </div>
        </form>
@endsection