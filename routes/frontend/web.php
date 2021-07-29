<?php

use Illuminate\Support\Facades\Route;

Route::prefix('home')->name('home.')->group(function () {
    Route::get('/', 'App\Http\Controllers\Frontend\Home\HomeController@index')->name('index');
    Route::get('/detail/{slug}', 'App\Http\Controllers\Frontend\Home\HomeController@detail')->name('detail');
});