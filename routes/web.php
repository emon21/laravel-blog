<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Artisan;
use Modules\Blog\Entities\Post;

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

      // Route::prefix('user')->group(function () {

      //    Route::get('/',[UserController::class,'index'])->name('user');

      //    Route::get('/user_setting',[UserController::class,'UserSetting'])->name('UserSetting');

      //   Route::get('/login',[UserController::class,'UserLogin']);
      // });

// =================================== User Controller Route End    ===================================


Route::resource('user', UserController::class);


// =================================== Website Controller Route Start ===================================

Route::get('/',[WebsiteController::class,'index'])->name('website');
Route::get('/category',[WebsiteController::class,'category'])->name('website.category');
// Route::get('/SingleCategory',[WebsiteController::class,'SingleCategory'])->name('website.category');
Route::get('/singlePost/{slug}',[WebsiteController::class,'singlePost'])->name('website.post');
Route::get('/blog',[WebsiteController::class,'BlogList'])->name('blog')->name('website.blog');

// Route::get('/test',function(){
//    $posts = Post::all();
//    $id = 50;
//    foreach($posts as $post){
      
      
//       $post->image = 'https://picsum.photos/id/' . $id . '/700/600';
     
//      // $post->image = "https://i.picsum.photos/id/".$id."/997/200/300.jpg";
   
//       $post->save();
//       $id++;
//    }
//    return $posts;
// });
//Route::view('/','frontend.index');

// =================================== Website Controller Route End   ===================================



// =================================== Admin Controller Route Start  ===================================

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function (){
    Route::get('/', [AdminController::class, 'index'])->name('adminlogin');
    Route::get('/home', [AdminController::class, 'home'])->name('admin');
    
    // Route::get('/home', [AdminController::class, 'home'])->name('backend');
    // Route::view('/start','backend.layouts.started');
    // Route::view('/clock', 'backend.clock');
});

// Route::prefix('admin')->middleware(['auth'])->group(function(){

//    Route::get('/dashboard' ,[DashboardController::class,'index'])->name('dashboard');
// });

// Route::prefix('admin')->middleware(['auth','admin'])->group(function(){

//     Route::get('/dashboard' ,[AdminController::class,'home'])->name('dashboard');
// });

// =================================== Admin Controller Route End    ===================================

Route::get('clear_cache', function () {

   Artisan::call('cache:clear');

  // dd("Cache is cleared");
  return back();

});

