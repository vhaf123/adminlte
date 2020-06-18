<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;

class RecursosController extends Controller
{
    public function index(){

        $cursos = Curso::all();

        return view('recursos.index', compact('cursos'));
    }
}
