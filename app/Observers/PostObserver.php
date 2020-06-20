<?php

namespace App\Observers;

use App\Post;
use Illuminate\Support\Str;

class PostObserver
{
    public function creating(Post $post)
    {

        $slug = Str::slug($post->name, '-');

        while ($post::where('slug', $slug)->count()) {
            $slug = $slug.rand(1,1000);
        }

        $post->slug = $slug;
        
        if(! \App::runningInConsole()){
            $post->blogger_id = auth()->user()->blogger->id;
        }
    }

    public function updating(Post $post)
    {
        $slug = Str::slug($post->name, '-');

        while ($post::where('slug', $slug)->count()) {
            $slug = $slug.rand(1,1000);
        }

        $post->slug = $slug;

    }
}
