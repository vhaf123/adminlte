<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Curso;
use App\Manual;
use App\Post;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware(['can:admin.home']);
    }
    
    public function index()
    {


        $usuarios = User::all();
        $cursos = Curso::where('profesor_id', auth()->user()->profesor->id)->get();
        $manuales = Manual::all();
        $posts = Post::where('blogger_id', auth()->user()->blogger->id)->get();
        return view('admin.home', compact('usuarios', 'cursos', 'manuales', 'posts'));
    }
    
}
