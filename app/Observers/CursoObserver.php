<?php

namespace App\Observers;

use App\Curso;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

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
            $slug = $slug.rand(1,100);
        }

        $curso->slug = $slug;

        if(! \App::runningInConsole()){
            $curso->profesor_id = auth()->user()->profesor->id;
        }
        
    }

    public function deleting(Curso $curso)
    {
            
        foreach ($curso->videos as $video) {
            $filePath = str_replace('storage', 'public', $video->file);
            Storage::delete($filePath);
        }
        
    }

}
