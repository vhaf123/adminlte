<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Tema;
use App\Image;

use Illuminate\Support\Facades\Storage;

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
            'descripcion' => 'required',
            'capitulo_id' => 'required'
        ]);

        Tema::create($request->all());
    }

    
    public function edit(Tema $tema)
    {

        $capitulo = $tema->capitulo;

        $i = 0;

        foreach ($capitulo->temas as $tema2) {
            
            $i++;

            if($tema->id == $tema2->id){

                if($i == 1){

                    $tema['previous'] = null;

                }else{

                    $tema['previous'] =  $capitulo->temas[$i-2];

                }

                if($i == $capitulo->temas->count()){

                    $tema['next'] = null;

                }else{
                    $tema['next'] = $capitulo->temas[$i];
                }

            }
        }

        

        return view('admin.temas.edit', compact('tema'));

    }

   
    public function update(Request $request, Tema $tema)
    {

        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
        ]);


        $tema->update($request->all());

        return redirect()->route('admin.temas.edit', $tema)->with('info', 'Actualizado con éxito');
    }

   
    public function destroy(Tema $tema)
    {
        $tema->delete();
    }


    public function dropzone(Request $request, Tema $tema){

        $request->validate([
            'picture' => 'image|max:1024'
        ]);

        /* if($curso->picture){
            $picturePath = str_replace('storage', 'public', $curso->picture);
            Storage::delete($picturePath);
        } */

        $picture = $request->file('picture')->store('public/temas');

        $pictureUrl = Storage::url($picture);

        Image::create([
            'picture' => $pictureUrl,
            'imageable_id' => $tema->id,
            'imageable_type' => 'App\Tema'
        ]);


        /* $curso->picture = $pictureUrl;

        $curso->save(); */

    }
}
