@extends('layouts.default')
@section('content')
    <div class = "form-group">
        <div class = "col-md-12">
            <form method="GET" >
                {{csrf_field()}}
                <input type = "hidden" value="{{$new->id}}" id = "id" name="id">
                <div class="col-sm-7">
                    <div class="panel panel-primary">
                        <div class="panel-heading">

                            <h3 class="panel-title">
                                <table> <tr><td>{{$new->title}}</td></tr>
                                    <tr><td>опубликовано  {{$new->dateofPublish}}</td></tr></table>
                            </h3>
                        </div>
                        <div class="panel-body">
                            @if ($new->picture != "")

                                <img src="/images/new/{{ $new->picture}}" width="100%" alt="Изображение" class="rightimg">

                            @else

                            @endif
{{$new->description}}


                            <div align = "right">  <button type="button" class="btn btn-lg btn-default"><a href="/news/showNews">Назад</a></button></div>
                        </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection