@extends('layouts.default')

@section('content')

<head>

    <title>Authentication</title>

</head>

<div class="jumbotron">
    <p><img src="../images/autorization.png" alt="авторизация"></p>
</div>
    <form method="POST" action="/auth/login">
        {!! csrf_field() !!}
        <div class="container">
            <div class = "col-md-6">
            <form class="form-signin" role="form">


             <h2 class="form-signin-heading">Пожалуйста авторизируйтесь</h2>
                <input type="email" name="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required autofocus  >
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <label class="checkbox">
                    <input type="checkbox" name="remember" value="remember-me"> Запомнить меня
                </label>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Авторизоваться</button>
            </form>
            </div>
    </div>
    </form>

@endsection


