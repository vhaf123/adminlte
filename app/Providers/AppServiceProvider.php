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
use App\Capitulo;
use App\Observers\CapituloObserver;
use App\Tema;
use App\Observers\TemaObserver;
use App\Video;
use App\Observers\VideoObserver;
use App\Modulo;
use App\Observers\ModuloObserver;
use App\Categoria;
use App\Observers\CategoriaObserver;
use App\Tag;
use App\Observers\TagObserver;

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
        Capitulo::observe(CapituloObserver::class);
        Tema::observe(TemaObserver::class);
        Video::observe(VideoObserver::class);
        Modulo::observe(ModuloObserver::class);
        Categoria::observe(CategoriaObserver::class);
        Tag::observe(TagObserver::class);
    }
}
