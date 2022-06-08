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

Route::prefix('admin/post')->middleware(['auth','admin'])->group(function() {
    Route::get('/', 'BlogController@index')->name('postList');
    Route::post('/addpost', 'BlogController@create')->name('addPost');
   // Route::get('/editPost/{title}', 'BlogController@edit')->name('editPost');
    Route::get('/edit/{post}', 'BlogController@edit')->name('editPost');
    Route::post('/UpdatePost/{post}', 'BlogController@update')->name('updatePost');
    Route::get('/deletepost/{post}', 'BlogController@destroy')->name('deletepost');
    Route::get('/view/{post}', 'BlogController@view')->name('viewpost');
});
