
<div class="d-flex flex-column p-3 card mb-2 align-items-center">

    <h3 class="mt-2">@if($user ?? null){{mb_strtoupper($user->name)}} @else GUEST @endif</h3>

    @if($user->admin)
    <a href="{{route('news.create')}}" class="btn btn-success p-1 mb-1" style="width: 150px">
        Добавить новость
    </a>
    @endcan
    @if($user->admin)
    <a href="{{route('categories.index')}}" class="btn btn-info p-1 mb-1" style="width: 150px">
        Категории
    </a>
    @endcan
</div>



@if(isset($main_categories))
    <div class="d-flex flex-column p-3 card mb-2 ">
        <form class="d-flex form-group flex-column align-items-center" action="{{route('news.index')}}" method="GET">
            <select name="category_id" id="category_id" class="form-control">
                @foreach($main_categories as $value)
                    <option value="{{ $value->id }}" @if($category_id == $value->id) selected @endif>
                        {{ $value->name }}
                    </option>
                @endforeach
            </select>
            <button class="btn btn-success mt-2">Найти</button>
        </form>

    </div>
@endif

