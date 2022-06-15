<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Modules\Category\Entities\Category;
use Illuminate\Support\Facades\View;
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
        $categories = Category::orderBy('ID','ASC')->inRandomOrder()->take(5)->get();
        view::share('categories',$categories);
        //setting
        $setting = Setting::first();
        view::share('setting',$setting);

    }
}
