<?php

namespace App\Observers;

use App\Capitulo;
use Illuminate\Support\Str;

class CapituloObserver
{
    public function creating(Capitulo $capitulo)
    {

        $slug = Str::slug($capitulo->name, '-');

        while (Capitulo::where('slug', $slug)->count()) {
            $slug = $slug.rand(1,100);
        }

        $capitulo->slug = $slug;
        
    }

    public function updating(Capitulo $capitulo)
    {
        $slug = Str::slug($capitulo->name, '-');

        while (Capitulo::where('slug', $slug)->count()) {
            $slug = $slug.rand(1,100);
        }

        $capitulo->slug = $slug;

    }
   

}
