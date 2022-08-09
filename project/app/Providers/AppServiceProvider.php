<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Menu;
use App\Article;
use App\Advertise;

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
        Schema::defaultStringLength('125');

        view()->composer('frontEnd.header-menu', function ($view){
            $menu = new Menu;
            $menulist = $menu->tree();
            $menuListHeader = $menulist->where('subMenu_id', 1);
            $menuListQuickAccess = $menulist->where('subMenu_id', 2);

            $view->with('menuListHeader', $menuListHeader);
            $view->with('menuListQuickAccess', $menuListQuickAccess);
        });

        view()->composer('frontEnd.layouts.tiny-header-menu', function ($view){
            $menu = new Menu;
            $menulist = $menu->tree();
            $menuListHeader = $menulist->where('subMenu_id', 1);

            $view->with('menuListHeader', $menuListHeader);
        });

        view()->composer('frontEnd.layouts.advertise', function ($view){
            $advertise = Advertise::first();
            $view->with('advertise', $advertise);
        });

        view()->composer('frontEnd.layouts.popular-articles', function ($view){
            $papularArticles = Article::limit(8)->get();
            $view->with('papularArticles', $papularArticles);
        });
    }
}
