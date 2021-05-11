<?php

namespace App\Providers;

use App\Models\Carrousel;
use App\Models\Category;
use App\Models\Category_Primary;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        view::share('categorias', Category::with('subcategorias')->get());
        view::share('carruseles', Carrousel::with('subcategory')->get());
        Paginator::useBootstrap();
    }
}
