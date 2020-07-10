<?php

namespace App\Observers;
use App\Manual;
use Illuminate\Support\Str;

class ManualObserver
{
    public function creating(Manual $manual)
    {

        $slug = Str::slug($manual->name, '-');

        $manual->slug = $slug;
        $manual->creador_id = auth()->user()->creador->id;
        
    }

    public function updating(Manual $manual){
        $slug = Str::slug($manual->name, '-');
        $manual->slug = $slug;
    }
    
}
