<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Modules\Category\Entities\Category;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Comment;
use Modules\Blog\Entities\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();


          //User
        view()->composer('*', function($view){
            if (Auth::check()) {
                  $view->with('currentUser', Auth::user());
            }else {
                  $view->with('currentUser', null);
            }
         });

      
        if (!app()->runningInConsole()) {
          //categories
          $categories = Category::orderBy('id','desc')->inRandomOrder()->take(5)->get();
          view::share('categories',$categories);
          //setting
          $setting = Setting::first();
          view::share('setting',$setting);

          //message send
          $contactCount = Contact::all()->count();
          $date = Contact::latest()->first();
          view::share('contactCount',$contactCount);
          view::share('date',$date);

       //    $currentUser = Auth::user();
       //   // $user('currentUser', Auth::user());
       //    view::share('currentUser',$currentUser);

          //Post Comment
       // $commentCount = Comment::with('user')->where('post_id',$post->id)->get();
          $usercommentCount = Comment::count();
          view::share('usercommentCount',$usercommentCount);

          $commentCount = Comment::with('user','post')->orderBy('id','desc')->limit(3)->get();
          view::share('commentCount',$commentCount);

     }
   }

}
      
   
       
   
    


