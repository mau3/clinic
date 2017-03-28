@extends('layouts.default')

@section('content')


        <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <h3>Приветствуем Вас на сайте нашей стоматологической клиники!</h3>
    <p><img src="/images/smile.png" alt="улыбка"></p>
</div>




    @if(Auth::user() != null && Auth::user()->isAdmin)
        <div align = "right"> <button style="width:300px;height:50px" type="button"   class="btn btn-lg btn-default"><a href="/news/addNews">Добавить новость</a></button></div>
        <div align = "right"> <button style="width:300px;height:50px" type="button" class="btn btn-lg btn-default"><a href="/admin/addUser">Добавить пользователя</a></button></div>
        <div align = "right"> <button  style="width:300px;height:50px" type="button" class="btn btn-lg btn-default"><a href="/admin/addPosition">Добавить должность</a></button></div>
        <div align = "right"> <button style="width:300px;height:50px" type="button" class="btn btn-lg btn-default"><a href="/services/addService">Добавить услугу</a></button></div>
        <div align = "right"> <button style="width:300px;height:50px" type="button" class="btn btn-lg btn-default"><a href="/receptions/addReception">Записать на прием</a></button></div>
        <div align = "right"> <button style="width:300px;height:50px" type="button" class="btn btn-lg btn-default"><a href="/news/showNews">Просмотр новостей</a></button></div>
        <div align = "right"> <button style="width:300px;height:50px" type="button" class="btn btn-lg btn-default"><a href="/receptions/indexAdmin">Просмотреть приемы</a></button></div>
    @endif

@if(Auth::user()!= null && Auth::user()->staff != null && Auth::user()->isAdmin == 0 )
        <div align = "right"><button style="width:300px;height:50px" type="button" class="btn btn-lg btn-default"><a href="/receptions/index">Провести приемы</a></button></div>
@endif
@if(Auth::user()!= null && Auth::user()->patient != null )
    <div align = "right"><button style="width:300px;height:50px" type="button" class="btn btn-lg btn-default"><a href="/receptions/userReceptions">Просмотреть приемы</a></button></div>
@endif



<div class="conclusion">
   <p>Рады были приветствовать Вас в нашей клинике. Пусть Ваша улыбка всегда остается здоровой и белоснежной, а опыт,высокий профессиональный уровень врачей и внимание администрации к каждому пациенту помогут Вам в этом.</p>
</div>
   @endsection