<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Video;

class VideoController extends Controller
{

    public function __construct(){
        $this->middleware(['can:admin.cursos.index']);
        $this->middleware(['can:admin.cursos.create']);
        $this->middleware(['can:admin.cursos.show']);
        $this->middleware(['can:admin.cursos.edit']);
        $this->middleware(['can:admin.cursos.destroy']);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'modulo_id' => 'required',
            'name' => 'required',
            'descripcion' => 'required',
            'iframe' => 'required'
        ]);

        Video::create($request->all());
    }

    public function edit(Video $video){

        return view('admin.videos.edit', compact('video'));
    }

    
    public function update(Request $request, Video $video)
    {

        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'iframe' => 'required'
        ]);
        
        $video->name = $request->get('name');
        $video->descripcion = $request->get('descripcion');
        $video->iframe = $request->get('iframe');

        //$video->update($request->all());

        if($request->file('file')){
            
            $filePath = str_replace('storage', 'public', $video->file);
            Storage::delete($filePath);

            $file = $request->file('file')->store('public/cursos/files');

            $fileUrl = Storage::url($file);
            $video->file = $fileUrl;
            
        }

        $video->save();

        return redirect()->route('admin.videos.edit', $video)->with('info', 'Actualizado con éxito');
   

    }

   
    public function destroy(Video $video)
    {
        $video->delete();
    }
}
