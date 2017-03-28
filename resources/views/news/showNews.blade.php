@extends('layouts.default')

@section('content')
    <div class="jumbotron">
        <h3>Приветствуем Вас на сайте нашей стоматологической клиники!</h3>
        <p><img src="/images/smile.png" alt="улыбка"></p>
    </div>

    <input type = "hidden" value = "{{csrf_token()}}" id = "csrf_token">
    <div id ="news-list">
        <div class = "container">

                       @foreach($news as $new)
           <div class="row">
                            <style>
                                .col-sm-7 {
                                    left: 25%;
                                }
                                    .rightimg{
                                        float: left;
                                }

                            </style>



            <div class="col-sm-7">
                <div class="panel panel-primary">
                    <div class="panel-heading">

                             <h3 class="panel-title">
                                    <table> <tr><td>{{$new->title}}</td></tr>
                                            <tr><td>опубликовано {{$new->dateofPublish}}</td></tr></table>
                             </h3>
                    </div>
                <div class="panel-body">
                    @if ($new->picture != "")

                       <img src="/images/new/{{ $new->picture}}" width="30%" alt="Изображение" class="rightimg">

                    @else

                    @endif

                        <?php
                        $str = $new->description ;

                        $rest = substr( trim($str), 0, 300);
                            if(strlen ($str) > 200)
                        {
                            $rest=$rest."...";
                        }
                        ?>

                        {{ $str }}


                        <div align = "right">  <button type="button" class="btn btn-lg btn-default"><a href="{{URL::to('/news/showone',array($new->id))}}">Подробнее</a></button></div>
                    </div>
                </div>
            </div>


        </div>
            @endforeach
                <div class="col-sm-7">
                    <?php echo $news->render(); ?>
                </div>
        </div>
    </div>

@endsection