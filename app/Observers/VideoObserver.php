<?php

namespace App\Observers;

use App\Video;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

class VideoObserver
{
    public function creating(Video $video)
    {

        $slug = Str::slug($video->name, '-');

        while (Video::where('slug', $slug)->count()) {
            $slug = $slug.rand(1,1000);
        }

        $video->slug = $slug;
    }

    public function deleting(Video $video)
    {
            
        $filePath = str_replace('storage', 'public', $video->file);
        Storage::delete($filePath);
        
    }

}
