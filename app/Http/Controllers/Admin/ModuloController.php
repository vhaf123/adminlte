<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modulo;

class ModuloController extends Controller
{
   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'curso_id' => 'required'
        ]);

        Modulo::create($request->all());
    }

    
    public function show(Modulo $modulo)
    {
        $this->authorize('dictado', $modulo);
        return view('admin.modulos.show', compact('modulo'));
    }

    
    public function update(Request $request, Modulo $modulo)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $modulo->update($request->all());
    }

    
    public function destroy(Modulo $modulo)
    {
        $modulo->delete();
    }
}
