<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Category;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.header', function ($view) {
           
             $allCategories = Category::where('status','active')->get();
            $view->with(['categories'=>$allCategories]);

        });
        view()->composer('layouts.header', function ($view) {
           
            $companys = Company::where('status','active')->get();

           $view->with(['companys'=>$companys]);

       });
    }
}
