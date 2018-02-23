<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Security\Models\Setting;

class FooterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      view()->composer('Site::layouts.footer',function($view){
          $footer = Setting::where(['status'=>1])->first();
            $view->with(compact('footer'));
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
