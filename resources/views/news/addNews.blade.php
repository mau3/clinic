@extends('layouts.default')

@section('content')

    <div class="jumbotron">
        <p><img src="../images/new.jpg" alt="добавить новость"></p>
    </div>

    <form method="POST" action="/news/addNews" enctype="multipart/form-data">
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
                <label for="InputDate">Дата создания</label>
                <input id = "InputDate" type="date" name="dateofPublish" class="form-control" placeholder="Введите дату создания" >

                <label for="InputTitle">Заголовок новости</label>
                <input id = "InputTitle"  name="title" class="form-control"  placeholder="Введите заголовок">

                <label for="InputDescription">Содержание</label>
                <input id = "InputDescription"  name="description" class="form-control"  placeholder="Введите содержание новости">

                <input type="file" accept="picture/*" id="" name="picture">

                <button class="btn btn-lg btn-primary btn-block" type="submit">Добавить новость</button>
                    </div>

                </div>

    </form>

@endsection