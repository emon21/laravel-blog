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

Route::prefix('admin/tag')->group(function() {
    Route::get('/', 'TagController@index')->name('taglist');
    Route::post('/create', 'TagController@create')->name('CreateTag');
    Route::get('/edit/{tag}', 'TagController@edit')->name('EditTag');
    Route::put('/update/{tag}', 'TagController@update')->name('UpdateTag');
    Route::get('/delete/{tag}', 'TagController@destroy')->name('DeleteTag');

});

