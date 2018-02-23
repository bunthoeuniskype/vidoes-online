<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Admin\Models\Category;
use App;
class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('Site::layouts.menu',function($view){
          $category = Category::where(['language_code' => App::getLocale(), 'status'=>1])->orderBy('order','ASC')->get();
            $view->with(compact('category'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
