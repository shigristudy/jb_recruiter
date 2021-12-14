<?php

namespace App\Providers;

use App\Http\Controllers\Controller;
use App\Models\Recruiter;
use App\Models\RecruiterWebsite;
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

        $excludedViews = ['mail.contact','mail.apply','errors::404','errors::403','errors::minimal'];

        view()->composer('*', function ($view) use($excludedViews) {
            // dump(->getName());
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
