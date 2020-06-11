<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Image;

use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function destroy(Image $image){

        $picturePath = str_replace('storage', 'public', $image->picture);
        Storage::delete($picturePath);
        
        $image->delete();

        return back()->with('La imagen se eliminó con éxito');

    }
}
