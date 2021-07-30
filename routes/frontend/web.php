<?php

use Illuminate\Support\Facades\Route;

Route::name('home.')->group(function () {
    Route::get('/', 'App\Http\Controllers\Frontend\Home\HomeController@index')->name('index');
    Route::get('/detail/{slug}', 'App\Http\Controllers\Frontend\Home\HomeController@detail')->name('detail');
    Route::get('/category/{slug}', 'App\Http\Controllers\Frontend\Home\HomeController@category')->name('category');
});
Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', 'App\Http\Controllers\Frontend\Contact\ContactController@index')->name('index');
    Route::post('/create', 'App\Http\Controllers\Frontend\Contact\ContactController@create')->name('create');
   
});