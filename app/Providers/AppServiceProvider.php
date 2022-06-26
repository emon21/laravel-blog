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
use Modules\Tag\Entities\Tag;

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

          //categories
          $categoryList = Category::all();
          view::share('categoryList',$categoryList);

          //Tag
          $taglist = Tag::all();
          view::share('taglist',$taglist);

          //Post
          $postlist = Post::all();
          view::share('postlist',$postlist);

         // $categoryList = Category::withCount('posts')->get();
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

          //user Post

         // $user = Auth::check();
          //return $user->id;
         // $userpost = Auth::user()->post()->latest()->get();
        //  $userpost = Post::with('user')->where('user_id', $user)->get();
          // $userID = Auth::check()->user()->id;
         // $userpost = Post::WithCount('user')->get();
         // $userpost = Post::withCount('user')->where('user_id',1)->get();

       //  view::share('userpost',$userpost);

     }
   }

}
      
   
       
   
    


