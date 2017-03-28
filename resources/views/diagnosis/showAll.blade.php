@extends('layouts.default')

@section('content')

    <div class = "col-md-12">

        <h3>Диагнозы</h3>

    </div>

    <input type = "hidden" value = "{{csrf_token()}}" id = "csrf_token">
    <div id="diagnosis-list">
        <table class="table table-bordered table-hover">
            <tr>
                <th class = "text-center">Содержание</th>
            </tr>
            <tr>
               @foreach($ds as $d)
                            <td class ="text-center">{{$d->content}}</td>

            </tr>
            @endforeach
        </table>
        <div align = "right">  <button type="button" class="btn btn-lg btn-default"><a href="/receptions/userReceptions">Назад</a></button></div>

    </div>

@endsection