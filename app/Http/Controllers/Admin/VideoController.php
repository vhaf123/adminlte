<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Video;

class VideoController extends Controller
{
    
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

    
    public function update(Request $request, Video $video)
    {

        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'iframe' => 'required'
        ]);

        $video->update($request->all());
    }

   
    public function destroy(Video $video)
    {
        $video->delete();
    }
}
