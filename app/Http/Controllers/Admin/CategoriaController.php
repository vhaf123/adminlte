<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categorias = Categoria::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => "required|unique:categorias",
            'descripcion' => "required"
        ]);

        $categoria = Categoria::create($request->all());

        return redirect()->route('admin.categorias.edit', $categoria)->with('info', 'Se creo la categoría con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {

        $request->validate([
            'name' => "required|unique:categorias,name,". $categoria->id,
            'descripcion' => "required"
        ]);

        $categoria->update($request->all());

        return redirect()->route('admin.categorias.edit', $categoria)->with('info', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('admin.categorias.index')->with('info', 'Se elimino la categoría con éxito');
    }

    public function dropzone(Request $request, Categoria $categoria){

        $request->validate([
            'picture' => 'image|max:1024'
        ]);

        if($categoria->picture){
            $picturePath = str_replace('storage', 'public', $categoria->picture);
            Storage::delete($picturePath);
        }

        $picture = $request->file('picture')->store('public/categorias');

        $pictureUrl = Storage::url($picture);

        $categoria->picture = $pictureUrl;

        $categoria->save();

    }
}
