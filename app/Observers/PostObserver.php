<?php

namespace App\Observers;

use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    public function creating(Post $post)
    {

        $slug = Str::slug($post->name, '-');
        $post->slug = $slug;
        $post->title = $post->name;
        $post->description = $post->extracto;
        
        if(! \App::runningInConsole()){
            $post->blogger_id = auth()->user()->blogger->id;
        }
    }

    public function updating(Post $post){
        $slug = Str::slug($post->name, '-');
        $post->slug = $slug;
    }

    public function deleting(Post $post){
        if($post->picture){
            $picturePath = str_replace('storage', 'public', $post->picture);
            Storage::delete($picturePath);
        }
    }

}
