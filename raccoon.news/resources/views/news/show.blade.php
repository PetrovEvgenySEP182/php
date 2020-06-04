<?php
$default_image = '/img/no-img.jpg';
?>

@extends('layouts.app');

@section('content')

    <div class="d-flex flex-column p-3 card mb-2" style="width: 100%">
        <div class="d-flex">
            <h3>{{$news->title}}</h3>

            <form class="ml-auto" action="{{route('news.destroy', $news)}}" method="post">
                @csrf
                @method('DELETE')

                <div class="btn-group">
                    @can('update', $news)
                    <a class="btn btn-info" href="{{route('news.edit', $news)}}">Редактировать</a>
                    @endcan
                    @can('delete', $news)
                    <button class="btn btn-danger">Удалить</button>
                    @endcan
                </div>
            </form>

        </div>

        <div class="d-flex flex-row" style="font-size: 12px">
            <img src="@if($news->image_url){{$news->image_url}} @else {{$default_image}} @endif"
                 style="width: 200px" class="mr-2 mb-auto">
            <div class="d-flex">
                <p>{{$news->text}}</p>
            </div>
        </div>

        <div class="d-flex mt-2" style="font-size: 10px">
            <p class="mr-1">{{$news->user->name}}, </p>
            <p class="mr-1">{{$news->category->name}}, </p>
            <p>{{$news->created_at}}</p>
        </div>
    </div>

@endsection
