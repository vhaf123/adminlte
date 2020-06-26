<?php

namespace App\Observers;
use App\Modulo;

use Illuminate\Support\Facades\Storage;

class ModuloObserver
{
    public function deleting(Modulo $modulo)
    {
            
        foreach ($modulo->videos as $video) {
            if($video->file){
                $filePath = str_replace('storage', 'public', $video->file);
                Storage::delete($filePath);
            }
        }
        
    }
}
