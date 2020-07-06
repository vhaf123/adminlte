<?php

namespace App\Observers;

use App\Categoria;
use Illuminate\Support\Str;

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
}
