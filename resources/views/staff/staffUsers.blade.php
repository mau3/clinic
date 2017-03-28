@extends('layouts.default')

@section('content')

    <div class = "col-md-12">

    </div>
    <input type = "hidden" value = "{{csrf_token()}}" id = "csrf_token">
    <div id="user-list">
        <table class="table table-bordered table-hover">
            <tr>
                <th class = "text-center">Фамилия</th>
                <th class = "text-center">Имя</th>
                <th class = "text-center">Отчество</th>
                <th class = "text-center">Должность</th>
                <th class = "text-center">Биография</th>
                <th class = "text-center">Фотография</th>
            </tr>

            <tr>
                @foreach($staffs as $staff)
                    <td class ="text-center">{{ $staff->user->surname}}</td>
                    <td class ="text-center">{{ $staff->user->firstName}}</td>
                    <td class = "text-center">{{ $staff->user->secondName}}</td>
                    <td class ="text-center">
                        @if ($staff->user->isAdmin == 0)
                            @foreach($staff->positions as $position)
                                {{$position->name}}
                            @endforeach
                        @else
                            Администратор
                        @endif
                    </td>
                    <td class ="text-center">{{ $staff->biography}}</td>
                    @if ($staff->photo == NULL)
                        <td class="text-center">Отсутствует</td>
                    @else
                        <td><img src="/images/staff/{{ $staff->photo}}" width="50%" alt="Фото сотрудника"></td>
                    @endif
            </tr>

            @endforeach
        </table>

    </div>
@endsection/