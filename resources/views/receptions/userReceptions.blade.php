@extends('layouts.default')

@section('content')

    <div class = "col-md-12">

        <h3>Приемы</h3>

    </div>

    <input type = "hidden" value = "{{csrf_token()}}" id = "csrf_token">
    <div id="receptions-list">
        <table class="table table-bordered table-hover">
            <tr>
                <th class = "text-center">Дата приема</th>
                <th class = "text-center">Время приема</th>
                <th class = "text-center">Информация о приеме</th>
                <th class = "text-center">ФИО врача</th>
                <th class = "text-center">ФИО пациента</th>

            </tr>
            <tr>
                @foreach($receptions as $rec)
                    @foreach($rec as $reception)
                    @if ($reception->patient->user->id == Auth::id())

                        <td class ="text-center">{{ $reception->date}}</td>
                        <td class ="text-center">{{ $reception->time}}</td>

                        <td class ="text-center">{{ $reception->someInformation}}</td>

                        <td class ="text-center">
                            {{$reception->staff->user->surname}}
                            {{$reception->staff->user->firstName}}
                            {{$reception->staff->user->secondName}}

                        </td>
                        <td class ="text-center">
                            {{$reception->patient->user->surname}}
                            {{$reception->patient->user->firstName}}
                            {{$reception->patient->user->secondName}}


                        </td>


                        <td class ="text-center">
                            <a href="{{URL::to('/recipes/showall',array($reception->id))}}">Посмотреть рецепты</a>
                            /
                            <a href="{{URL::to('/diagnosis/showall',array($reception->id))}}">Посмотреть диагнозы</a>


                        </td>
            </tr>

            @endif
            @endforeach
            @endforeach
        </table>
        <div align = "right">  <button type="button" class="btn btn-lg btn-default"><a href="/home/index">Назад</a></button></div>
    </div>

@endsection