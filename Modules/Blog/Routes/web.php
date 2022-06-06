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

Route::prefix('admin/blog')->group(function() {
    Route::get('/', 'BlogController@index')->name('postList');
    Route::post('/addpost', 'BlogController@create')->name('addPost');
    Route::get('/deletepost/{post}', 'BlogController@destroy')->name('deletepost');
});
