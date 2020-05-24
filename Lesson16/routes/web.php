<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'StudentController@index')
    ->name('index');
Route::post('/student/add', 'StudentController@add')
    ->name('student.add');

