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

         //User
         $user = User::first();
         view::share('user',$user);

         //Post Comment
        // $commentCount = Comment::with('user')->where('post_id',$post->id)->get();
         $commentCount = Comment::with('user','post')->orderBy('id','desc')->get();
         view::share('commentCount',$commentCount);


    }
}
