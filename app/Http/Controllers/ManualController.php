<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manual;

class ManualController extends Controller
{
    
    public function index()
    {
        $manuales = Manual::latest()
                    ->where('status', '!=', 1)                
                    ->paginate(8);
        
        return view('manuales.index', compact('manuales'));
    }

   
    public function show(Manual $manual)
    {

        if($manual->status == 1){
            abort(403, 'This action is unauthorized.');
        }else{
            return view('manuales.show', compact('manual'));
        }
        
    }
    
}
