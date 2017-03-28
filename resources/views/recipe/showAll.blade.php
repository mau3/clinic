@extends('layouts.default')

@section('content')

    <div class = "col-md-12">

        <h3>Рецепты</h3>

    </div>

    <input type = "hidden" value = "{{csrf_token()}}" id = "csrf_token">
    <div id="recipe-list">
        <table class="table table-bordered table-hover">
            <tr>
                <th class = "text-center">Содержание</th>
            </tr>
            <tr>
                @foreach($recipe as $r)
                        <td class ="text-center">{{$r ->content}}</td>

            </tr>
            @endforeach
        </table>
    </div>
    <div align = "right">  <button type="button" class="btn btn-lg btn-default"><a href="/receptions/userReceptions">Назад</a></button></div>

@endsection