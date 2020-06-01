<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Tema;

class TemaController extends Controller
{

    public function __construct(){
        $this->middleware(['can:admin.manuales.index']);
        $this->middleware(['can:admin.manuales.create']);
        $this->middleware(['can:admin.manuales.show']);
        $this->middleware(['can:admin.manuales.edit']);
        $this->middleware(['can:admin.manuales.destroy']);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'capitulo_id' => 'required'
        ]);

        Tema::create($request->all());
    }

    
    public function edit(Tema $tema)
    {
        return view('admin.temas.edit', compact('tema'));
    }

   
    public function update(Request $request, Tema $tema)
    {
        $tema->update($request->all());

        return redirect()->route('admin.temas.edit', $tema)->with('info', 'Actualizado con éxito');
    }

   
    public function destroy(Tema $tema)
    {
        $tema->delete();
    }
}
