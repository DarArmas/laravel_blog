<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Backend\Menu;
use Illuminate\Pagination\Paginator;
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
        //enviar a la vista aside menuP
        View::composer("theme.back.aside", function($view){
            $rol_id = session()->get('rol_id');
            $menuP = cache()->tags('Menu')->rememberForever("MenuPrincipal.rolid.$rol_id", function(){
                return Menu::getMenu(true);
            });
            $view->with('menuPrincipal', $menuP);
        });
    }
}
