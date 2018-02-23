<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Security\Models\Setting;

class SocialProfileServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
          view()->composer('Site::inc.social',function($view){
          $social = Setting::where(['status'=>1])->first();
            $view->with(compact('social'));
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
