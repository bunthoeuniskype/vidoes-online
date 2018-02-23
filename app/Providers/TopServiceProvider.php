<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Security\Models\Setting;

class TopServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
         view()->composer('Site::inc.top',function($view){
          $top = Setting::where(['status'=>1])->first();
          $view->with(compact('top'));
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
