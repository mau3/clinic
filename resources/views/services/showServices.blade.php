@extends('layouts.default')

@section('content')
    <div class="jumbotron">
        <h3>Приветствуем Вас на сайте нашей стоматологической клиники!</h3>
        <p><img src="/images/smile.png" alt="улыбка"></p>
    </div>

    <input type = "hidden" value = "{{csrf_token()}}" id = "csrf_token">
    <div id ="services-list">
        <table class="table table-bordered table-hover">
            <tr>
                <th class = "text-center">Наименование</th>
                <th class = "text-center">Описание услуги</th>
                <th class = "text-center">Стоимость</th>


            </tr>
            <tr>
                @foreach($services as $service)

                    <td class ="text-center">{{ $service->name}}</td>
                    <td class ="text-center">{{ $service->description}}</td>

                    <td class ="text-center">{{ $service->cost}}</td>


                    <td class ="text-center">
                        <a href="{{URL::to('/position/edit',array($service->id))}}">Редактировать</a>
                        /
                        <a href="{{URL::to('/position/delete',array($service->id))}}">Удалить</a>


                    </td>
            </tr>

            @endforeach
        </table>
    </div>

@endsection