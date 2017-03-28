@extends('layouts.default')

@section('content')
    <title>Записать на прием</title>
    <form method="POST" action="/receptions/addReception">
        {!! csrf_field() !!}

        <div class="container">
            <h2 class="form-signin-heading">Введите данные для записи</h2>
            <div class = "col-md-4">
                <label for="InputDate">Дата приема</label>
                <input id = "InputDate" type="date" name="date" class="form-control" placeholder="Введите дату приема"  >

                <label for="InputTime">Время</label>
                <input id = "InputTime" type="time" name="time" class="form-control" placeholder="Введите время приема">

                <label for="InputInfo">Дополнительная информация</label>
                <input id = "InputInfo" type="someInformation" name="someInformation" class="form-control" placeholder="Введите необходимую дополнительную информацию" >
                <label>ФИО пациента</label>
               <select name='patient[]'>
                    @foreach($patients as $patient)
                        <option value="{{$patient->user->id}}">{{ $patient->user->surname }} {{$patient->user->firstName }} {{$patient->user->secondName}}</option>
                    @endforeach
                </select>
                <label>ФИО врача</label>
                <select name='doctor[]'>
                    @foreach($staffs as $staff)
                        <option value="{{$staff->user->id}}">{{ $staff->user->surname }} {{$staff->user->firstName }} {{$staff->user->secondName}}</option>
                    @endforeach
                </select>


                <button class="btn btn-lg btn-primary btn-block" type="submit">Записать на прием</button>
            </div>
        </div>
    </form>
@endsection