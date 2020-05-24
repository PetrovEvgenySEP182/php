@if($errors->any())
    <ul style="color: red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('student.add') }}" method="post" >
    @csrf
    <input type="text" name="surname" placeholder="Фамилия...">
    <input type="text" name="name" placeholder="Имя...">
    <input type="text" name="patronymic" placeholder="Отчество...">
    <input type="number" name="age" placeholder="Возраст...">
    <input type="text" name="group_name"placeholder="Группа...">
    <button>Add</button>
</form>

<table border="1">
    <thead>
        <tr>
            <th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Возраст</th><th>Группа</th>
        </tr>
    </thead>

    @foreach($students as $student)
        <tr>
            <td>{{$student->surname}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->patronymic}}</td>
            <td>{{$student->age}}</td>
            <td>{{$student->group_name}}</td>
        </tr>
    @endforeach
</table>
