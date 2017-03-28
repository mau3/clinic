@extends('layouts.default')
@section('content')
    <div class = "form-group">
    <div class = "col-md-12">
        <h3>Редактировать должности</h3>
        <form method="POST" action="/position/update">
            {{csrf_field()}}
            <input type = "hidden" value="{{$position->id}}" id = "id" name="id">
            <div id="position-edit">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th class = "text-center">Наименование</th>
                        <th class = "text-center">Описание</th>
                    </tr>
                    <tr>
                            <td class ="text-center"><input type="text" id="name" name="name" value ="{{$position->name}}"> </td>
                            <td class ="text-center"><input type="text" id="description" name="description" value ="{{$position->description}}"> </td>
                    </tr>
                </table>
            </div>
            <button type="submit" id="update" name="update">Сохранить изменения</button>
</form>
        </div>
    </div>
@endsection