<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Curso;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CursoController extends Controller
{
    public function __construct(){
        $this->middleware(['can:admin.cursos.index']);
        $this->middleware(['can:admin.cursos.create']);
        $this->middleware(['can:admin.cursos.show']);
        $this->middleware(['can:admin.cursos.edit']);
        $this->middleware(['can:admin.cursos.destroy']);
    }
    
    public function index()
    {
        $cursos = Curso::where('profesor_id', auth()->user()->profesor->id)->latest()->get();
        return view('admin.cursos.index', compact('cursos'));
    }

    
    public function create()
    {
        $categorias = DB::table('categorias')->pluck('name', 'id');
        $niveles = DB::table('niveles')->pluck('name', 'id');

        return view('admin.cursos.create', compact('categorias', 'niveles'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria_id' => 'required',
            'nivel_id' => 'required',
        ]);

        $curso = Curso::create($request->all());

        return redirect()->route('admin.cursos.show', $curso)->with('info', 'Se creó el curso con éxito');
    }

    
    public function show(Curso $curso)
    {
        $this->authorize('dictado', $curso);
        return view('admin.cursos.show', compact('curso'));
    }

    
    public function edit(Curso $curso)
    {
        $this->authorize('dictado', $curso);

        $categorias = DB::table('categorias')->pluck('name', 'id');
        $niveles = DB::table('niveles')->pluck('name', 'id');

        return view('admin.cursos.edit', compact('curso', 'categorias', 'niveles'));
    }

    
    public function update(Request $request, Curso $curso)
    {

        $this->authorize('dictado', $curso);

        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria_id' => 'required',
            'nivel_id' => 'required',
        ]);


        $resultado = $request->all();
        
        if($curso->name != $request->get('name')){

            $slug = Str::slug($request->get('name'), '-');

            while (Curso::where('slug', $slug)->count()) {
                $slug = $slug.rand(1,100);
            }

            $resultado = array_merge($resultado, ['slug' => $slug]);
            
        }




        $curso->update($resultado);

        return redirect()->route('admin.cursos.show', $curso)->with('info', 'Se actualizó el curso con éxito');;
    }

    
    public function destroy(Curso $curso)
    {
        $this->authorize('dictado', $curso);

        if($curso->picture){
            $picturePath = str_replace('storage', 'public', $curso->picture);
            Storage::delete($picturePath);
        }

        $curso->delete();

        return redirect()->route('admin.cursos.index')->with('info', 'Eliminado con éxito');
    }

    public function dropzone(Request $request, Curso $curso){
        
        $this->authorize('dictado', $curso);

        $request->validate([
            'picture' => 'image|max:1024'
        ]);

        if($curso->picture){
            $picturePath = str_replace('storage', 'public', $curso->picture);
            Storage::delete($picturePath);
        }

        $picture = $request->file('picture')->store('public/cursos');

        $pictureUrl = Storage::url($picture);

        $curso->picture = $pictureUrl;

        $curso->save();

    }

    public function status(Curso $curso){

        switch ($curso->status) {
            case 1:
                $curso->update(['status' => 2]);
                break;

            case 2:
                $curso->update(['status' => 3]);
                break;

        }

        return redirect()->route('admin.cursos.show', $curso)->with('info', 'Se actualizó el estado con éxito');
        
    }
}
