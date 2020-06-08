<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Post;
use App\Manual;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /*  public function __construct()
    {
        $this->middleware('auth');
    }
 */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $cursos = Curso::orderBy('users_count', 'desc')
                ->latest('id')
                ->where('status', '!=', 1)
                ->take(8)
                ->get();


        $cursos_publicados = Curso::where('status', '!=', 1)->count();
        $posts_publicados = Post::where('status', '!=', 1)->count();
        $manuales_publicados = Manual::where('status', '!=', 1)->count();

        return view('home', compact('cursos', 'cursos_publicados', 'posts_publicados', 'manuales_publicados'));
    }
}
