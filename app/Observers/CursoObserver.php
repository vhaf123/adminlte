<?php

namespace App\Observers;

use App\Curso;
use Illuminate\Support\Str;

class CursoObserver
{
    /**
     * Handle the curso "created" event.
     *
     * @param  \App\Curso  $curso
     * @return void
     */
    public function creating(Curso $curso)
    {

        $slug = Str::slug($curso->name, '-');

        while (Curso::where('slug', $slug)->count()) {
            $slug = $slug.rand(1,1000);
        }

        $curso->slug = $slug;

        if(! \App::runningInConsole()){
            $curso->profesor_id = auth()->user()->profesor->id;
        }
        
    }
}
