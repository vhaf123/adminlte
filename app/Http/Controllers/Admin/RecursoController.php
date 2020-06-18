<?php

namespace App\Http\Controllers\Admin;

use App\Video;

use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecursoController extends Controller
{
    public function destroy(Video $video){

        $filePath = str_replace('storage', 'public', $video->file);
        Storage::delete($filePath);
         
        $video->update([
            'file' => null
        ]);

        return back()->with('info', "Se eliminó los recursos con éxito");
    }
}
