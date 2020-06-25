<?php

namespace App\Observers;

use App\Tema;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

class TemaObserver
{
    public function creating(Tema $tema)
    {

        $slug = Str::slug($tema->name, '-');

        while (Tema::where('slug', $slug)->count()) {
            $slug = $slug.rand(1,100);
        }

        $tema->slug = $slug;
        
    }

    public function deleted(Tema $tema)
    {
        foreach ($tema->images as $image) {
            
            $picturePath = str_replace('storage', 'public', $image->picture);
            Storage::delete($picturePath);
            
            $image->delete();
           
        }
    }
    
}
