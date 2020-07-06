<?php

namespace App\Observers;

use App\Categoria;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoriaObserver
{
    public function creating(Categoria $categoria){
        $slug = Str::slug($categoria->name, '-');
        $categoria->slug = $slug;
    }

    public function updating(Categoria $categoria){
        $slug = Str::slug($categoria->name, '-');
        $categoria->slug = $slug;
    }

    public function deleting(Categoria $categoria){

        if($categoria->picture){
            $picturePath = str_replace('storage', 'public', $categoria->picture);
            Storage::delete($picturePath);
        }
        
    }
}
