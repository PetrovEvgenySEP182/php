@extends('layouts.app');

@section('content')

{{--    <div class="d-flex p-0 m-0">--}}

{{--        <div class="d-flex flex-column block mr-2" style="width: 75%;">--}}

            @forelse($news as $item)
                <div class="d-flex flex-column p-2 card" style="width: 100%">
                    <div class="d-flex">
                        <p>{{$item->title}}</p>
                    </div>
                    <div class="d-flex flex-row">
                        <img src="">
                        <div class="d-flex">
                            <p>{{$item->text}}</p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <p>{{$item->user()->name}}</p>
                        <p>{{$item->category()->name}}</p>
                    </div>
                </div>
            @empty
                <div class="d-flex card alert alert-secondary p-2">
                    Новости еще не были добавлены!
                </div>
            @endforelse

{{--        </div>--}}


{{--        <div class="d-flex card align-items-center p-2" style="width: 25%; max-height: 150px">--}}
{{--            @include('user-menu')--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
