@extends('layouts.default')

@section('content')

    <div class="jumbotron">
        <p><img src="../images/services.jpg" alt="добавить услугу"></p>
    </div>

    <form method="POST" action="/services/addService" enctype="multipart/form-data">
        {!! csrf_field() !!}

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container">
            <h2 class="form-signin-heading">Введите данные для добавления</h2>
            <div class = "col-md-4">
                <label for="InputName">Наименование услуги</label>
                <input id = "InputName"  name="name" class="form-control" placeholder="Введите наименование" >

                <label for="InputDescription">Описание</label>
                <input id = "InputDescription"  name="description" class="form-control"  placeholder="Введите описание услуги">

                <label for="InputCost">Стоимость</label>
                <input id = "InputCost"  name="cost" class="form-control"  placeholder="Введите стоимость">

                <button class="btn btn-lg btn-primary btn-block" type="submit">Добавить услугу</button>
            </div>

        </div>

    </form>

@endsection