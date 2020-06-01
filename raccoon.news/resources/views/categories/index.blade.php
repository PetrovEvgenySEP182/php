@extends('layouts.app');

@section('content')

    <div class="card p-2">
        <a href="{{route('categories.create')}}" class="mr-auto btn btn-success mb-3">
            Добавить категорию
        </a>

        @forelse($categories as $category)
            @if($loop->first)
                <table class="table table-bordered table-striped"><thead>
                    <tr>
                        <th>№</th>
                        <th>Наименование</th>
                        <th>Действия</th>
                    </tr>
                    </thead><tbody>
                    @endif

                    <tr>
                        <td class="p-2 text-center">{{$loop->index + 1}}</td>
                        <td class="p-2">{{ $category->name }}</td>

                        <td class="pd-0">

                            <form class="ml-auto" action="{{route('categories.destroy', $category)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group">
                                    @can('update', $category)
                                        <a class="btn btn-info" href="{{route('categories.edit', $category)}}">Редактировать</a>
                                    @endcan
                                    <button class="btn btn-danger">Удалить</button>
                                </div>
                            </form>

                        </td>
                    </tr>

                    @if($loop->last)
                    </tbody></table>
            @endif

        @empty
            <div class="alert alert-secondary">
                Категории не добавлены
            </div>
        @endforelse
    </div>

@endsection
