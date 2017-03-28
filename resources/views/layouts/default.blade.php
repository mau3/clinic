<!DOCTYPE html>
<html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>


<head>
    <title>Stomatology clinic - Smile</title>
</head>

<body role="document">

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse " role="navigation">
     <div class="container">
         <div class="navbar-header">
            <a class="navbar-brand" href="/home/index">Клиника "Dent22"</a>
         </div>
         <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

                <li class="active"><a href="/home/index">Главная страница</a></li>
                <li><a href="/home/about">О клинике</a></li>
                <li><a href="/home/contact">Контакты</a></li>
                <li><a href="/news/showNews">Новости</a></li>
 @if(Auth::user() == null )
                <li><a href="/services/showServicesUser">Услуги</a></li>
                <li><a href="/staff/staffUsers">Наши сотрудники</a></li>
 @endif
                @if(Auth::user()!= null && Auth::user()->patient != null)

                <li><a href="/staff/staffUsers">Наши сотрудники</a></li>
                <li><a href="/services/showServicesUser">Услуги</a></li>
                @endif

 @if(Auth::user() != null && Auth::user()->staff != null && Auth::user()->isAdmin)
                <li><a href="/staff/staff">Пользователи</a></li>
                <li><a href="/services/showServices">Услуги</a></li>
                 <li><a href="/admin/addUser">Добавить пользователя</a></li>
                 <li><a href="/positions/positions">Должности</a></li>
 @endif
               @if(Auth::user()!= null && Auth::user()->staff != null && Auth::user()->isAdmin == 0 )
                        <li><a href="/staff/staffUsers">Наши сотрудники</a></li>
                        <li><a href="/services/showServicesUser">Услуги</a></li>
                    @endif
            </ul>

            @if(Auth::user() != null )
                <div align = "right"><button type="button" class="btn btn-lg btn-default"><a href="/auth/logout">Выйти</a></button></div>
            @endif
            @if(Auth::user()== null)
            <div align = "right"><button type="button" class="btn btn-lg btn-default"><a href="/auth/login">Авторизоваться</a></button></div>
            @endif
         </div>
        </div>
    </div>

</body>


<div class="container theme-showcase" role="main">

    @yield('content')

</div> <!-- /container -->

<style>
.text {
text-align:  center;
}
</style>
<footer>
<div class = "text">
Стоматологическая клиника "Dent22" - 2017
</div>
</footer>
</html>
</head>