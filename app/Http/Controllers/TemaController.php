<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tema;
use App\Manual;

class TemaController extends Controller
{
    public function show(Manual $manual, Tema $tema){
        return view('temas.show', compact('manual', 'tema'));
    }
}
