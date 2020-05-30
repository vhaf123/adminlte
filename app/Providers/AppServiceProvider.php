<?php

namespace App\Providers;

use App\User;
use App\Observers\UserObserver;
use App\Curso;
use App\Observers\CursoObserver;
use App\Post;
use App\Observers\PostObserver;
use App\Manual;
use App\Observers\ManualObserver;

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
        User::observe(UserObserver::class);
        Curso::observe(CursoObserver::class);
        Post::observe(PostObserver::class);
        Manual::observe(ManualObserver::class);
    }
}
