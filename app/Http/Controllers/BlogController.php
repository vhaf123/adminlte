<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class BlogController extends Controller
{
   
    public function index()
    {
        $posts =Post::where('status', '!=', 1)
                    ->latest()
                    ->paginate(9);

        $populares = Post::where('status', '!=', 1)
                    ->latest('contador')
                    ->get()
                    ->take(6);
        
        return view('blog.index', compact('posts', 'populares'));
    }

    
    public function show(Post $post)
    {

        $contador = $post->contador;
        $contador++;

        if($post->status == 1){
            abort(403, 'This action is unauthorized.');
        }else{

            $post->update([
                    'contador' => $contador
            ]);

            return view('blog.show', compact('post'));
        }
    }
    
}
