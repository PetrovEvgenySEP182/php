@extends('layouts.app')


@section('content')
    <div class="d-flex">
        <h1>
            {{$todo->title}}
            @if($todo->isComplete())
                <span class="badge badge-success">
                Выполнено
            </span>
            @endif
        </h1>

        <form class="ml-auto" action="{{route('todos.destroy', $todo)}}" method="post">
            @csrf
            @method('DELETE')
            <div class="btn-group">
                <a class="btn btn-info" href="{{route('todos.edit', $todo)}}">Редактировать</a>
                <button class="btn btn-danger">Удалить</button>
            </div>
        </form>
    </div>

    <div class="text-muted">
        {{$todo->user->name}}
    </div>

    <div class="mb-3"></div>

    <p class="lead card card-body">
        {{$todo->description}}
    </p>
@endsection
