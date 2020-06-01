<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Requisito;

class RequisitoController extends Controller
{
    
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'curso_id' => 'required'
        ]);

        Requisito::create($request->all());
    }

    
    public function update(Request $request, Requisito $requisito)
    {

        $request->validate([
            'name' => 'required',
        ]);
        
        $requisito->update($request->all());
    }

    
    public function destroy(Requisito $requisito)
    {
        $requisito->delete();
    }
}
