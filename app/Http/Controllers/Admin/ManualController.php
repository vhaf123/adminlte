<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use App\Manual;
use App\Categoria;

class ManualController extends Controller
{
    public function __construct(){
        $this->middleware(['can:admin.manuales.index']);
        $this->middleware(['can:admin.manuales.create']);
        $this->middleware(['can:admin.manuales.show']);
        $this->middleware(['can:admin.manuales.edit']);
        $this->middleware(['can:admin.manuales.destroy']);
    }
    
    public function index()
    {
        $manuales = Manual::all();

        return view('admin.manuales.index', compact('manuales'));
    }

    
    public function create()
    {
        $categorias = Categoria::pluck('name', 'id');
        return view('admin.manuales.create', compact('categorias'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:manuales',
            'title' => 'required',
            'descripcion' => 'required',
            'categoria_id' => 'required',
        ]);

        $manual = Manual::create($request->all());

        return redirect()->route('admin.manuales.show', compact('manual'))->with('info', 'Manual creado con éxito');
    }

    
    public function show(Manual $manual)
    {
        return view('admin.manuales.show', compact('manual'));
    }

    
    public function edit(Manual $manual)
    {
        $categorias = Categoria::pluck('name', 'id');
        
        return view('admin.manuales.edit', compact('manual', 'categorias'));
    }

    
    public function update(Request $request, Manual $manual)
    {
        $request->validate([
            'name' => 'required|unique:manuales,name,'.$manual->id,
            'title' => 'required',
            'descripcion' => 'required',
            'categoria_id' => 'required',
        ]);

        $manual->update($request->all());

        return redirect()->route('admin.manuales.show', $manual)->with('info', 'Actualizado con éxito');
    }
    
    public function destroy(Manual $manual)
    {
        $manual->delete();

        return redirect()->route('admin.manuales.index')->with('info', "Eliminado con éxito");
    }

    public function status(Manual $manual){
        if($manual->status == 1){
            $manual->update([
                'status' => 2
            ]);
        }

        return redirect()->route('admin.manuales.show', $manual)->with('info', 'El estado se actualizó con éxito');
    }
}
