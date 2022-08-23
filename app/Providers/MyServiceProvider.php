<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use App\Http\View\Composers\MenusComposer;
use App\Http\View\Composers\FooterComposer;
use App\Http\View\Composers\SearchComposer;
use App\Http\View\Composers\PopularComposer;
use App\Http\View\Composers\SideBarComposer;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['app.layouts.header'], MenusComposer::class);
        view()->composer(['app.index'], PopularComposer::class);
        view()->composer(['app.layouts.partials.side-bar'], SideBarComposer::class);
        view()->composer(['app.layouts.footer'], FooterComposer::class);
        // view()->composer(['app.layouts.footer'], SearchComposer::class);

    }
}
