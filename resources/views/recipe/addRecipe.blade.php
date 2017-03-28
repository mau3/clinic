@extends('layouts.default')

@section('content')


    <form method="POST" action="/recipe/addRecipe" enctype="multipart/form-data">
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
                <label for="InputDate">содержание рецепта</label>
                <input id = "InputDate" name="content" class="form-control" placeholder="Введите содержание" >

                <input type = "hidden" value="{{$rec->id}}" id = "reception_id" name="reception_id">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Добавить рецепт</button>
            </div>

        </div>

    </form>

@endsection