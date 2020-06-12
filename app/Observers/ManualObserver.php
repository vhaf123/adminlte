<?php

namespace App\Observers;
use App\Manual;
use Illuminate\Support\Str;

class ManualObserver
{
    public function creating(Manual $manual)
    {

        $slug = Str::slug($manual->name, '-');

        while (Manual::where('slug', $slug)->count()) {
            $slug = $slug.rand(1,100);
        }

        $manual->slug = $slug;



        if(! \App::runningInConsole()){
            $manual->creador_id = auth()->user()->creador->id;
        }
        
    }
}
