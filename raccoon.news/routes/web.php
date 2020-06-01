<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::redirect('/', '/news');

Route::resource('news', 'NewsController');

Route::middleware('auth')->group(function (){
    Route::resource('categories', 'CategoryController');
});

