<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Classes\Important;
class AuthorizeSiteProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {       
    
            try {              
                $imp = new Important;
                $imp->get_auth_tcurl();
            } catch (Exception $e) {
                
        }
           
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
