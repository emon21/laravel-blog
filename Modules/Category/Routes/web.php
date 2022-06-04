<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin/category')->group(function() {
    Route::get('/', 'CategoryController@index')->name('category');
    Route::post('/create', 'CategoryController@create')->name('create');
    Route::get('/edit/{category}', 'CategoryController@edit')->name('edit');
    Route::put('/update/{category}', 'CategoryController@update')->name('update');
    Route::get('/delete/{category}', 'CategoryController@destroy')->name('delete');
    Route::get('/status/{category}', 'CategoryController@status')->name('status');
});



