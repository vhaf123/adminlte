<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Capitulo;

class CapituloController extends Controller
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
            'name' => "required",
            'manual_id' => "required"
        ]);

        Capitulo::create($request->all());
    }

    public function show(Capitulo $capitulo){
        return view('admin.capitulos.show', compact('capitulo'));
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
