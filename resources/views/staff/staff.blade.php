@extends('layouts.default')

@section('content')

<div class = "col-md-12">

<h3>Пользователи</h3>

</div>

    <input type = "hidden" value = "{{csrf_token()}}" id = "csrf_token">
    <div id="user-list">
<table class="table table-bordered table-hover">
    <tr>
        <th class = "text-center">Email</th>
        <th class = "text-center">Фамилия</th>
        <th class = "text-center">Имя</th>
        <th class = "text-center">Отчество</th>
        <th class = "text-center">Телефонный номер</th>
        <th class = "text-center">Дата рождения</th>
        <th class = "text-center">Адрес прописки</th>
        <th class = "text-center">Должность/статус</th>
        <th class = "text-center">Номер страхового полиса</th>
        <th class = "text-center">Биография</th>
        <th class = "text-center">Фотография</th>
    </tr>
    <tr>
            @foreach($patients as $patient)
                <td class ="text-center"> {{ $patient->user->email}}</td>
                <td class ="text-center"> {{ $patient->user->surname}}</td>
                <td class ="text-center"> {{ $patient->user->firstName}}</td>
                <td class = "text-center"> {{ $patient->user->secondName}}</td>
                <td class = "text-center"> {{ $patient->user->phoneNumber}}</td>
                <td class = "text-center"> {{ $patient->user->dob}}</td>
                <td class = "text-center"> {{ $patient->user->address}}</td>
                <td class ="text-center"> Пациент</td>
                <td class ="text-center"> {{ $patient->ssn}}</td>
                <td class ="text-center"> Отсутствует </td>
                <td class ="text-center"> Отсутствует </td>
                <td class ="text-center">
                     <a href="{{URL::to('/user/edit',array($user->id))}}">Редактировать</a>
                   / <a href="{{URL::to('/admin/deletepatient',array($patient->user_id))}}" onclick="return confirm('Действительно удалить?');">Удалить</a>
                </td>
    </tr>
    @endforeach
    <tr>
            @foreach($staffs as $staff)
                <td class ="text-center">{{ $staff->user->email}}</td>
                <td class ="text-center">{{ $staff->user->surname}}</td>
                <td class ="text-center">{{ $staff->user->firstName}}</td>
                <td class = "text-center">{{ $staff->user->secondName}}</td>
                <td class = "text-center">{{ $staff->user->phoneNumber}}</td>
                <td class = "text-center">{{ $staff->user->dob}}</td>
                <td class = "text-center">{{ $staff->user->address}}</td>
                <td class ="text-center">
                    @if ($staff->user->isAdmin == 0)
                        @foreach($staff->positions as $position)
                            {{$position->name}}
                        @endforeach
                    @else
                        Администратор
                    @endif
                </td>

                <td class ="text-center">Отсутствует</td>
                <td class ="text-center">{{ $staff->biography}}</td>
        @if ($staff->photo == NULL)
                <td class="text-center">Отсутствует</td>
        @else
                <td><img src="/images/staff/{{ $staff->photo}}" width="100%" alt="Фото сотрудника"></td>
            @endif
                <td class ="text-center">
                     <a href="((URL::to('/user/edit',array($user->id))))">Редактировать</a>
                   / <a href="((URL::to('/admin/delete',array($staff->user_id))"onclick="return confirm('Действительно удалить?');">Удалить</a>
                </td>
    </tr>

    @endforeach
</table>

    </div>
        @endsection