<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\TeamController;
use App\Models\Team;
use Illuminate\Support\Facades\Artisan;
use Modules\Blog\Entities\Post;
use Modules\Category\Entities\Category;

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

// ===================== User Controller Route Start ================
Route::middleware(['auth'])->group(function (){
   
   Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
   //profile
   Route::get('user/profile', [UserController::class, 'UserProfile'])->name('UserProfile');
   Route::post('user/profile', [UserController::class,'UserUpdate'])->name('UserUpdate');

   //user Post
   Route::get('/insertpost', [UserController::class,'insert'])->name('user.post');
   Route::post('/createpost', [UserController::class,'createpost'])->name('createpost');
   Route::get('/postlist', [UserController::class,'postlist'])->name('postlist');

  // Route::get('profile', [UserController::class,'adminProfile'])->name('user/profile');
  // Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});


// ======================= User Controller Route End  ================

// ========================= Website Controller Route Start =====================

Route::get('/',[WebsiteController::class,'index'])->name('website');
Route::get('/about',[WebsiteController::class,'about'])->name('about');
Route::get('/contact',[WebsiteController::class,'contact'])->name('contact');
Route::post('/contact',[WebsiteController::class,'sendMessage'])->name('send_message');
Route::get('/blog',[WebsiteController::class,'BlogList'])->name('website.blog');
Route::get('/category',[WebsiteController::class,'category'])->name('website.category');
Route::get('/tag/{slug}',[WebsiteController::class,'tag'])->name('website.tag');
Route::get('/SingleCategory/{slug}',[WebsiteController::class,'SingleCategory'])->name('singleCategory');
Route::get('/singlePost/{slug}',[WebsiteController::class,'singlePost'])->name('website.post');

//Route::get('/comment',[CommantController::class,'comment'])->name('comment');
Route::post('/comment',[CommentController::class,'UserComment'])->name('userComment');
//Team
//Route::get('team', [WebsiteController::class,'team'])->name('team');

//Email Subscribe
Route::resource('subscribe', SubscribeController::class);


Route::get('/test',function(){

   $id = 50;
   // $cat = Category::all();
   // foreach($cat as $value){
   // $value->image = 'https://picsum.photos/id/' . $id . '/700/600';
   // $value->save();
   // $id++;
   // }
  //return $cat;
   $posts = Post::all();
   foreach($posts as $post){
      $post->image = 'https://picsum.photos/id/' . $id . '/700/600';
      $post->save();
      $id++;
   }
  return $posts;
 // return 'Post && Category Dummy Image Insert Successfully Done';
});

// =================================== Admin Controller Route Start  ===================================

// //custom admin login route start
// Route::get('/admin', [AdminController::class, 'getLogin'])->name('getLogin');
// Route::post('/admin', [AdminController::class, 'postLogin'])->name('postLogin');
// Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
// Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
// //custom admin login route end

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function (){
   
   //admin
   Route::get('/', [AdminController::class, 'index'])->name('adminlogin');
    Route::get('dashboard', [DashboardController::class,'index'])->name('admin.dashboard');

    //user
    Route::resource('user', UserController::class);
    Route::get('user/view/{user}', [UserController::class,'userView'])->name('user/view');

    //profile
    Route::get('profile', [UserController::class,'adminProfile'])->name('admin/profile');
    Route::post('profile', [UserController::class,'AdminUpdate'])->name('admin/profile/update');

    //website Setting
    Route::get('setting',[SettingController::class,'edit'])->name('setting');
    Route::post('setting',[SettingController::class,'update'])->name('setting.update');

    //contact
    Route::get('/contact',[ContactController::class,'index'])->name('message');
    Route::get('/contact/{id}',[ContactController::class,'show'])->name('contact.show');
    Route::delete('/contact/delete/{id}',[ContactController::class,'destroy'])->name('contact.delete');

    //comment
   Route::get('/comment',[CommentController::class,'index'])->name('comment');
   Route::get('/comment/{singlecomment}',[CommentController::class,'commentView'])->name('comment.view');

   //subscribe
   Route::get('subscribe', [DashboardController::class,'subscribe'])->name('admin.subscribe');

   //Team
  // Route::get('/team',[TeamController::class,'index'])->name('team');
   Route::resource('team', TeamController::class);
   // Route::get('/test',function(){
   //    $id = 50;
   //    $teams = Team::all();
   //    foreach($teams as $team){
   //       $team->team_img = 'https://picsum.photos/id/' . $id . '/700/600';
   //       $team->save();
   //       $id++;
   //    }
   //   return $teams;
   // });

});

// =================================== Admin Controller Route End    ================================
