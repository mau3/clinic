@extends('layouts.default')

@section('content')

    <div class="jumbotron">
        <p><img src="../images/addUser.png" alt="добавить пользователя"></p>
    </div>

    <form method="POST" action="/admin/addUser" enctype="multipart/form-data">
        {!! csrf_field() !!}

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container">
                <h2 class="form-signin-heading">Введите данные для добавления</h2>
                <div class = "col-md-4">
                    <label for="InputEmail">Email пользователя</label>
                    <input id = "InputEmail" type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Введите email" >

                    <label for="InputPassword">Пароль пользователя</label>
                    <input id = "InputPassword" type="password" name="password" class="form-control"  placeholder="Введите пароль">

                    <label for="InputSurname">Фамилия</label>
                    <input id = "InputSurname" type="surname" name="surname" class="form-control" value="{{ old('surname') }}" placeholder="Введите фамилию">

                    <label for="InputfirstName">Имя</label>
                    <input id = "InputfirstName" type="firstName" name="firstName" class="form-control" value="{{ old('firstName') }}" placeholder="Введите имя" >

                    <label for="InputsecondName">Отчество</label>
                    <input id = "InputsecondName" type="secondName" name="secondName" class="form-control" value="{{ old('secondName') }}" placeholder="Введите отчество" >

                    <label for="InputphoneNumber">Телефонный номер</label>
                    <input id = "InputphoneNumber" type="phoneNumber" name="phoneNumber" class="form-control" value="{{ old('phoneNumber') }}" placeholder="Введите номер телефона" >

                    <label for="Inputdob">Дата рождения</label>
                    <input id = "Inputdob" type="date" name="dob" class="form-control" value="{{ old('dob') }}" placeholder="yyyy-mm-dd" >

                    <label for="Inputaddress">Адрес прописки</label>
                    <input id = "Inputaddress" type="address" name="address" class="form-control" value="{{ old('address') }}" placeholder="Адрес прописки" >

          <div id="myDiv1" style="display:none">
              <div id = "myDiv1">
                    <label for="Inputssn">Cтраховой полис пациента</label>
                    <input id = "Inputssn" type="ssn" name="ssn" class="form-control" placeholder="Номер страхового полиса" value="{{ old('ssn') }}" >
              </div>
          </div>

             <div id="myDiv2" style="display:none">
                <div id = "myDiv2">
                        <label for="Inputbiography">Информация о сотруднике</label>
                        <input id = "Inputbiography" type="biography" name="biography" class="form-control" value="{{ old('biography') }}" placeholder="Информация о сотруднике" >
                        <input type="file" accept="image/*" id="photo" name="photo">
                   </div>
             </div>
              <div id="myDiv3" style="display:none">
                   <div id = "myDiv3">

                       <select name='position[]' multiple>
                            @foreach($position as $position)
                                <option value="{{$position->id}}">{{ $position->name }}</option>
                            @endforeach
                       </select>

                       </div>

                  </div>

                <div id = "myDiv">
                         <label class="radio-inline"><input type="radio" name="type" value="admin" onChange="showStaff()">Администратор</label>
                         <label class="radio-inline"><input type="radio" name="type" value="doctor" onChange="showDoctor()">Доктор</label>
                         <label class="radio-inline"><input type="radio" name="type" value="patient" onChange="showPatient()">Пациент</label>
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Добавить пользователя</button>
                    </div>
        </div>
</form>

        <script>

            function showStaff() {
                document.getElementById('myDiv2').style.display='block';
                document.getElementById('myDiv1').style.display='none';
                document.getElementById('myDiv3').style.display='none';
            }
            function showDoctor() {
                document.getElementById('myDiv2').style.display='block';
                document.getElementById('myDiv3').style.display='block';
                document.getElementById('myDiv1').style.display='none';
            }
             function showPatient() {
                 document.getElementById('myDiv1').style.display='block';
                 document.getElementById('myDiv2').style.display='none';
       }

        </script>
@endsection