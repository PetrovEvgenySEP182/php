<?php
$update = isset($news);
?>

@extends('layouts.app')

@section('content')

    <div class="card card-body">

        <h2>{{$update ? 'Редактирование' : 'Новая новость'}}</h2>

        <form action="{{ $update ? route('news.update', $news) : route('news.store')}}" method="post">
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
                <label for="category_id">Категория <span class="text-danger">*</span></label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $value)
                        <option @if(($news->category_id ?? '') == $value->id || old('category_id') === $value->id) selected @endif value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>

                @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image_url">Картинка </label>
                <input class="form-control"
                       type="text" name="image_url" id="image_url"
                       placeholder="URL картинки..."
                       value="{{old('image_url') ?? ( $news->image_url ?? '' )}}">
            </div>

            <div class="form-group">
                <label for="text">Текст <span class="text-danger">*</span></label>
                <textarea class="form-control @error('text') is-invalid @enderror" type="text" name="text"
                          id="text">{{old('text') ?? ($news->text ?? '')}}
                </textarea>

                @error('text')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>


            <button class="btn btn-success">{{$update ? 'Обновить' : 'Добавить'}}</button>
        </form>

    </div>

@endsection
