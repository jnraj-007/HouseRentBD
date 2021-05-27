<?php

namespace App\Providers;

use App\Models\Interest;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
//        dd(auth('user')->user());
//        $userInterested=Interest::where('postAuthorId',auth('user')->user()->id)->paginate('5');
//
//
//        View::share('userInterested', $userInterested);
//        $products=::all();
    }
}
