@extends('layouts.default')

@section('content')

    <div class = "col-md-12">

        <h3>Должности</h3>

    </div>

    <input type = "hidden" value = "{{csrf_token()}}" id = "csrf_token">
    <div id="position-list">
        <table class="table table-bordered table-hover">
            <tr>
                <th class = "text-center">Наименование</th>
                <th class = "text-center">Описание</th>
            </tr>
            <tr>
        @foreach($position as $position)

            <td class ="text-center">{{ $position->name}}</td>
            <td class ="text-center">{{ $position->description}}</td>
            <td class ="text-center">

                <a href="{{URL::to('/position/edit',array($position->id))}}">Редактировать</a>
              /
                <a href="{{URL::to('/position/delete',array($position->id))}}" onclick="return confirm('Действительно удалить?');">Удалить</a>


            </td>
            </tr>

            @endforeach
        </table>
    </div>

@endsection