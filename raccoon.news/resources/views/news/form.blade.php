<?php
$update = isset($news);
?>

@extends('layouts.app')

@section('content')

    <h2>{{$update ? 'Редактирование' : 'Новая новость'}}</h2>

    <div class="card card-body">

        <form action="{{ $update ? route('news.update', $todo) : route('news.store')}}" method="post">
            @csrf
            @if($update)
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="title">Заголовок <span class="text-danger">*</span> </label>
                <input class="form-control @error('title') is-invalid @enderror"
                       type="text" name="title" id="title"
                       placeholder="Заголовок..."
                       value="{{old('title') ?? ( $news->title ?? '' )}}">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category">Категория</label>
                <select name="category" id="category" class="form-control">
                    @foreach($categories as $key => $value)
                        <option @if(($news->category ?? '') == $value || old('category') === $key) selected @endif value="{{ $key }}">{{ $value->name }}</option>
                    @endforeach
                </select>

                @error('category')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="text">Текст</label>
                <textarea class="form-control" type="text" name="text"
                          id="text">{{old('text') ?? ($news->text ?? '')}}</textarea>
            </div>


            <button class="btn btn-success">{{$update ? 'Обновить' : 'Добавить'}}</button>
        </form>

    </div>

@endsection
