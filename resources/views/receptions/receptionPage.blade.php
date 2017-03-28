@extends('layouts.default')
@section('content')
    <div class = "form-group">
            <form method="GET" >
                {{csrf_field()}}
                <input type = "hidden" value="{{$rec->id}}" id = "id" name="id">
                <div id="rec">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th class = "text-center">Дата</th>
                            <th class = "text-center">Время</th>
                            <th class = "text-center">Описание</th>
                            <th class = "text-center">ФИО врача</th>
                            <th class = "text-center">ФИО пациента</th>
                        </tr>

                        <tr>

                                <td class ="text-center">{{ $rec->date}}</td>
                                <td class ="text-center">{{ $rec->time}}</td>
                                <td class ="text-center">{{ $rec->description}}</td>
                            <td class ="text-center">
                                {{$rec->staff->user->surname}}
                                {{$rec->staff->user->firstName}}
                                {{$rec->staff->user->secondName}}
                  </td>

                            <td class ="text-center">
                                {{$rec->patient->user->surname}}
                                {{$rec->patient->user->firstName}}
                                {{$rec->patient->user->secondName}}


                                </td>
                        </tr>


                </table>

                    <div align = "right">  <button type="button" class="btn btn-lg btn-default"><a href="{{URL::to('/recipe/create',array($rec->id))}}">Добавить рецепт</a></button></div>
                    <div align = "right">  <button type="button" class="btn btn-lg btn-default"><a href="{{URL::to('/diagnosis/create',array($rec->id))}}">Добавить диагноз</a></button></div>

                            <div align = "right">  <button type="button" class="btn btn-lg btn-default"><a href="/index/home">Назад</a></button></div>
                    </div>
            </form>
        </div>
    </div>
@endsection