<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;

class TagController extends Controller
{
    public function show(Tag $tag){


        $posts = $tag->posts()
                    ->where('status', '!=', 1)
                    ->latest()
                    ->paginate(9);

        

        $populares = $tag->posts()
                    ->where('status', '!=', 1)
                    ->latest('contador')
                    ->get()
                    ->take(6);


        return view('blog.index', compact('posts', 'populares'));
    }
}
