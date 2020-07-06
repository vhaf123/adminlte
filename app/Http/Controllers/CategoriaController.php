<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Nivel;
use App\Curso;

class CategoriaController extends Controller
{
    public function show(Categoria $categoria){

        $categorias = Categoria::all();
        $niveles = Nivel::all();

        $cursos = Curso::where('categoria_id', $categoria->id)
                    ->where('status', '!=', 1)
                    ->paginate(8);

        return view('categorias.show', compact('categoria', 'categorias', 'niveles', 'cursos'));
    }
}
