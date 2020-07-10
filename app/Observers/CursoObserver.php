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
        $curso->slug = $slug;
        $curso->profesor_id = auth()->user()->profesor->id;

        /* if(! \App::runningInConsole()){
            
        } */
        
    }

    public function updating(Curso $curso){
        $slug = Str::slug($curso->name, '-');
        $curso->slug = $slug;
    }

    public function deleting(Curso $curso)
    {
            
        foreach ($curso->videos as $video) {
            if($video->file){
                $filePath = str_replace('storage', 'public', $video->file);
                Storage::delete($filePath);
            }
        }
        
    }

}
