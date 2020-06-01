<?php
$update = isset($category);
?>

@extends('layouts.app')

@section('content')

    <div class="card card-body">
        <h2>{{$update ? 'Редактирование' : 'Новая категория'}}</h2>

        <form action="{{ $update ? route('categories.update', $todo) : route('categories.store')}}" method="post">
            @csrf
            @if($update)
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="name">Наименование <span class="text-danger">*</span> </label>
                <input class="form-control @error('name') is-invalid @enderror"
                       type="text" name="name" id="name"
                       placeholder="Наименование..."
                       value="{{old('name') ?? ( $categories->name ?? '' )}}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button class="btn btn-success">{{$update ? 'Обновить' : 'Добавить'}}</button>
        </form>

    </div>

@endsection
