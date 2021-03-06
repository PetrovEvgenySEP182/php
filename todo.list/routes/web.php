<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::redirect('/', '/todos');
Route::resource('todos', 'TodoController')
    ->middleware('auth');
