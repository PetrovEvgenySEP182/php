<p>@if($user){{$user->name}} @else Гость @endif</p>

<a href="{{route('news.create')}}" class="btn btn-success p-1 mb-1" style="width: 150px">
    Добавить новость
</a>
<a href="{{route('categories.index')}}" class="btn btn-info p-1 mb-1" style="width: 150px">
    Категории
</a>
