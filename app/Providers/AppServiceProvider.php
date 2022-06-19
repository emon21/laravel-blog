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
        view()->composer('*', function($view)
         {
            if (Auth::check()) {
                  $view->with('currentUser', Auth::user());
            }else {
                  $view->with('currentUser', null);
            }
         });

       
         if (!app()->runningInConsole()) {
            
            // $setting = Setting::first();

            // $default_language = Language::where('code', config('zakirsoft.default_language'))->first();
            // view()->share('defaultLanguage', $default_language);

            // // view()->share('adminNotifications', auth()->user()->notifications()->take(10));
            // $cookies = Cookies::first();
            // view()->share('cookies', $cookies);

            // view()->share('website_setting', WebsiteSetting::first());
            // view()->share('cms_setting', Cms::first());

            // view()->share('hcountries',  Country::all());
            // view()->share('setting', $setting);
            // view()->share('currency_symbol', config('jobpilot.currency_symbol'));

            // $languages = Language::all();
            // view()->share('languages', $languages);
            // session()->put('commingsoon_mode', $setting->commingsoon_mode);


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
