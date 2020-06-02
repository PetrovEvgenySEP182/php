<?php
$default_image = '/img/no-img.jpg';
?>

@extends('layouts.app');

@section('content')

        @forelse($news as $item)
            <div class="d-flex flex-column p-3 card" style="width: 100%">
                <div class="d-flex">
                    <h3>{{$item->title}}</h3>
                </div>
                <div class="d-flex flex-row" style="font-size: 12px">
                    <img src="@if($item->image_url){{$item->image_url}} @else {{$default_image}} @endif"
                         style="width: 200px" class="mr-2">
                    <div class="d-flex">
                        <p>{{$item->getTextPreview()}}</p>
                    </div>
                </div>
                <div class="d-flex mt-2" style="font-size: 10px">
                    <p>{{$item->user->name}}</p>,
                    <p>{{$item->category->name}}</p>,
                    <p>{{$item->created_at}}</p>
                </div>
            </div>
        @empty
            <div class="d-flex card alert alert-secondary p-2">
                Новости еще не были добавлены!
            </div>
        @endforelse


@endsection
