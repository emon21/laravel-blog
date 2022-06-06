<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// =================================== User Controller Route Start ===================================

    // Route::group(['middleware'=>['auth']],function(){
    //     // Route::get('/', [AdminController::class, 'index'])->name('admin');
    //     // Route::get('/home', [AdminController::class, 'home'])->name('backend');

    // Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin/dashboard');

    // Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin/logout');
    // });

Route::prefix('user')->group(function () {

    Route::get('/',[UserController::class,'index'])->name('user');

    Route::get('/user_setting',[UserController::class,'UserSetting'])->name('UserSetting');

    Route::get('/login',[UserController::class,'UserLogin']);
});

// =================================== User Controller Route End    ===================================


// =================================== Website Controller Route Start ===================================

//Route::view('/',[WebsiteController::class,'index']);
Route::view('/','frontend.index');

// =================================== Website Controller Route End   ===================================



// =================================== Admin Controller Route Start  ===================================

Route::group(['prefix' => 'admin'],function (){
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    // Route::get('/home', [AdminController::class, 'home'])->name('backend');
    // Route::view('/start','backend.layouts.started');
    // Route::view('/clock', 'backend.clock');
});
Route::prefix('admin')->middleware(['auth'])->group(function(){

    Route::get('/dashboard' ,[DashboardController::class,'index']);
});

// =================================== Admin Controller Route End    ===================================
