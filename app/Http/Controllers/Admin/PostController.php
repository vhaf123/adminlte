<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Post;
use App\Tag;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware(['can:admin.posts.index']);
        $this->middleware(['can:admin.posts.create']);
        $this->middleware(['can:admin.posts.show']);
        $this->middleware(['can:admin.posts.edit']);
        $this->middleware(['can:admin.posts.destroy']);
    }
    
    public function index()
    {
        $posts = Post::where('blogger_id', auth()->user()->blogger->id)->latest()->get();

        return view('admin.posts.index', compact('posts'));
    }

    
    public function create()
    {
        $tags = Tag::all();
        return view('admin.posts.create', compact('tags'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:posts',
            'extracto' => 'required|string|max:255',
            'tags' => 'required'
        ]);

        $post = Post::create($request->all());

        $post->tags()->sync($request->get('tags'));

        return redirect()->route('admin.posts.edit', $post);
    }
    
    public function edit(Post $post)
    {
        $this->authorize('redactado', $post);

        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'tags'));
    }

    
    public function update(Request $request, Post $post)
    {
        $this->authorize('redactado', $post);

        if($post->status == 2){

            $request->validate([
                'name' => 'required|string|max:255|unique:posts,name,'.$post->id,
                'extracto' => 'required|string|max:255',
                'body' => 'required',
                'tags' => 'required',
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255',
            ]);

        }else{
            $request->validate([
                'name' => 'required|string|max:255|unique:posts,name,'.$post->id,
            ]);
        }

        $post->update($request->all());

        $post->tags()->sync($request->get('tags'));

        return redirect()->route('admin.posts.edit', $post)->with('info', 'Post actualizado con éxito');
    }

    
    public function destroy(Post $post)
    {
        $this->authorize('redactado', $post);

        if($post->picture){
            $picturePath = str_replace('storage', 'public', $post->picture);
            Storage::delete($picturePath);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('info', 'Eliminado con éxito');
    }

    public function dropzone(Request $request, Post $post){
        $this->authorize('redactado', $post);
        
        $request->validate([
            'picture' => 'image|max:1024'
        ]);

        if($post->picture){
            $picturePath = str_replace('storage', 'public', $post->picture);
            Storage::delete($picturePath);
        }

        $picture = $request->file('picture')->store('public/posts');

        $pictureUrl = Storage::url($picture);

        $post->update([
            'picture' => $pictureUrl
        ]);
    }



    public function status(Post $post){
        
        $this->authorize('redactado', $post);

        switch ($post->status) {
            case 1:

                if(isset($post->name) && isset($post->extracto) && isset($post->body) && isset($post->title) && isset($post->description) && isset($post->picture)){
                    $post->update([
                        'status' => 2
                    ]);
                }else{
                    return "error";
                }
                
                break;
            case 2:
                $post->update([
                    'status' => 1
                ]);
                break;
        }
        
    }

    public function vista(Post $post){
        $this->authorize('redactado', $post);
        return view('blog.show', compact('post'));
    }

}
