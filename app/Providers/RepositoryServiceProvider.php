<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {
     
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\CategoryRepository::class, \App\Repositories\Eloquent\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SubCategoryRepository::class, \App\Repositories\Eloquent\SubCategoryRepositoryEloquent::class);
        // $this->app->bind(\App\Repositories\NewsRepository::class, \App\Repositories\Eloquent\NewsRepositoryEloquent::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}