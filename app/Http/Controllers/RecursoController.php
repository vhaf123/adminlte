<?php

namespace App\Http\Controllers;
use App\Video;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class RecursoController extends Controller
{

    public function show(Video $video){
        return view('recursos.show', compact('video'));
    }

    public function download(Video $video){
        $filePath = public_path($video->file);
        return response()->download($filePath);
    }

    
}
