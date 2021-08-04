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
Route::prefix('search')->name('search.')->group(function () {
    Route::get('/', 'App\Http\Controllers\Frontend\Search\SearchController@index')->name('index');
});
Route::prefix('customerpost')->name('customerpost.')->group(function () {
    Route::get('/create', 'App\Http\Controllers\Frontend\CustomerPost\CustomerPostController@index')->name('index');
    Route::post('/', 'App\Http\Controllers\Frontend\CustomerPost\CustomerPostController@create')->name('create');
    Route::get('/', 'App\Http\Controllers\Frontend\CustomerPost\CustomerPostController@select')->name('select');
    Route::get('/edit/{id}', 'App\Http\Controllers\Frontend\CustomerPost\CustomerPostController@edit')->name('edit');
    Route::patch('/update', 'App\Http\Controllers\Frontend\CustomerPost\CustomerPostController@update')->name('update');
    Route::get('/delete{id}', 'App\Http\Controllers\Frontend\CustomerPost\CustomerPostController@delete')->name('delete');
});
Route::post('/', 'App\Http\Controllers\Frontend\Comment\CommentController@createComment')->name('customer.comment');

Route::get('redirect/{driver}', 'App\Http\Controllers\Frontend\Customer\CustomerController@redirectToProvider')->name('login.provider');
Route::get('/callback/{provider}', 'App\Http\Controllers\Frontend\Customer\CustomerController@callback');
Route::post('/logout', 'App\Http\Controllers\Frontend\Customer\CustomerController@logout')->name('customer.logout');
