@extends('layouts.app');

@section('content')

    <div class="card p-2">

        <div class="d-flex">
            <h2 class="mt-3 ml-2 mb-3">Категории новостей</h2>

            <a href="{{route('categories.create')}}" class="ml-auto btn btn-success m-3">
                Добавить категорию
            </a>
        </div>


        @forelse($categories as $category)
            @if($loop->first)
                <table class="table table-bordered table-striped"><thead>
                    <tr>
                        <th class="w-auto">№</th>
                        <th>Наименование</th>
                        <th>Действия</th>
                    </tr>
                    </thead><tbody>
                    @endif

                    <tr>
                        <td class="p-2 text-center">{{$loop->index + 1}}</td>
                        <td class="p-2">{{ $category->name }}</td>

                        <td class="p-1 align-content-center w-25">

                            <form class="ml-auto" action="{{route('categories.destroy', $category)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group">
                                    <a class="btn btn-info" href="{{route('categories.edit', $category)}}">Редактировать</a>
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

        <div class="d-flex justify-content-center">
            {{$categories->links()}}
        </div>

    </div>


@endsection
