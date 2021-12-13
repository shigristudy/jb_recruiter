<?php

namespace App\Providers;

use App\Http\Controllers\Controller;
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

        $excludedViews = ['mail.contact','mail.apply'];

        view()->composer('*', function ($view) use($excludedViews) {

            if(!in_array($view->getName() , $excludedViews)){
                $controller = new Controller();
                $view->with(
                    [
                        'recruiter_website' => $controller->getRecruiterWebsiteData(),
                        'franchise'         => $controller->getRecruiter()
                    ]
                );
            }
        });
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
