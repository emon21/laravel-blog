<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Modules\Category\Entities\Category;
use Illuminate\Support\Facades\View;
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


    }
}
