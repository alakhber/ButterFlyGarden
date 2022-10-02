<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Page;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('main.partials._footer', function ($view) {
            $view->with(
                'pages',
                Page::whereStatus(1)->limit(5)->get()
            );
        });
        view()->composer('main.partials._footer', function ($view) {
            $view->with(
                'resendBlogs',
                Blog::whereStatus(1)->limit(5)->orderBy('id','DESC')->get()
            );
        });
    }
}
