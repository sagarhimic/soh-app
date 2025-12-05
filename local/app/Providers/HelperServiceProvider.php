<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as ViewFactory;


class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(ViewFactory $view)
    {
        /* Setting::getAllSettings(); */
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    	foreach (glob(app_path().'/Helpers/*.php') as $filename)
    	{
    		require_once($filename); 
    	}
    }
}
