<?php

namespace Xoxoday\Fileverify;

use Illuminate\Support\ServiceProvider;

class FileVerifyServiceProvider extends ServiceProvider
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
        
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        
    }

   
}
