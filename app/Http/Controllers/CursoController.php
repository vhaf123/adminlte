<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Review;
use app\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('matricular', 'review');
    }


    public function categoria(Categoria $categoria){
        /* return $categoria; */
    }

    
    public function index(Request $request)
    {
        $nivel_id = $request->get('nivel_id');
        $status = $request->get('status');
        $tipo_id = $request->get('tipo_id');

        $cursos = Curso::latest('users_count')
        
                    ->latest('id')
                    ->where('status', '!=', 1)
                    ->nivel($nivel_id)
                    ->tipo($tipo_id)
                    ->status($status)
                    ->paginate(8);

        
        $categorias = DB::table('categorias')->get();
        $niveles = DB::table('niveles')->get();

        return view('cursos.index', compact('cursos', 'categorias', 'niveles'));
    }

   
    public function show(Curso $curso)
    {
        if($curso->status == 1){
            abort(403, 'This action is unauthorized.');
        }else{
            return view('cursos.show', compact('curso'));
        }
    }

   

    public function matricular(Curso $curso)
    {
        $curso->users()->attach(auth()->user()->id);
        return redirect()->route('course-status.index', $curso);
    }

    public function review(Request $request, Curso $curso){
        Review::create([
            'curso_id' => $curso->id,
            'user_id' => auth()->user()->id,
            'rating' => $request->get('rating'),
            'comentario' => $request->get('comentario')
        ]);
        
        return back();
    }
   
}
