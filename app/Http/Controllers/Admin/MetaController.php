<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Meta;

class MetaController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'curso_id' => 'required'
        ]);

        Meta::create($request->all());
    }

    
    public function update(Request $request, Meta $meta)
    {

        $request->validate([
            'name' => 'required',
        ]);
        
        $meta->update($request->all());
    }

    
    public function destroy(Meta $meta)
    {
        $meta->delete();
    }
}
