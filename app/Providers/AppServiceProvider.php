<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //aqui eu deixo disponivel para toda aplicacao
        //estou pedindo todas as categorias
        $categoriasMenu = Category::all();
        view()->share('categoriasMenu',$categoriasMenu);
    }
}
