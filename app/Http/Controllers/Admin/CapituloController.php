<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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


        $resultado = $request->all();
        
        if($capitulo->name != $request->get('name')){

            $slug = Str::slug($request->get('name'), '-');

            while (Capitulo::where('slug', $slug)->count()) {
                $slug = $slug.rand(1,100);
            }

            $resultado = array_merge($resultado, ['slug' => $slug]);
            
        }

        $capitulo->update($resultado);
    }

    
    public function destroy(Capitulo $capitulo)
    {
        $capitulo->delete();
    }
}
