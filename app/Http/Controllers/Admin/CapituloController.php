<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Capitulo;

class CapituloController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            'manual_id' => "required"
        ]);

        Capitulo::create($request->all());
    }

   
    public function update(Request $request, Capitulo $capitulo)
    {
        $request->validate([
            'name' => "required"
        ]);

        $capitulo->update($request->all());
    }

    
    public function destroy(Capitulo $capitulo)
    {
        $capitulo->delete();
    }
}
