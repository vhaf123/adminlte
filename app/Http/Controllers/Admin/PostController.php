<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            'name' => 'required|string|max:255',
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

        $request->validate([
            'name' => 'required|string|max:255',
            'extracto' => 'required|string|max:255',
            'tags' => 'required',
            'body' => 'required'
        ]);

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
}
