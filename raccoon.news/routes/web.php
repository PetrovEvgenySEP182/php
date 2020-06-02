<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::redirect('/', RouteServiceProvider::HOME);

Route::resource('news', 'NewsController');

Route::middleware('auth')->group(function (){
    Route::resource('categories', 'CategoryController');
});

