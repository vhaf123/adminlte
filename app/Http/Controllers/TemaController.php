<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tema;
use App\Manual;

class TemaController extends Controller
{
    public function show(Manual $manual, Tema $tema){

        $actual = $tema;

        $i = 0;

        foreach ($manual->temas as $tema) {
            $i++;

            if($tema->id == $actual->id){

                if($i == 1){

                    $actual['previous'] = null;

                }else{

                    $actual['previous'] =  $manual->temas[$i-2];

                }

                if($i == $manual->temas->count()){

                    $actual['next'] = null;

                }else{
                    $actual['next'] = $manual->temas[$i];
                }

            }

        }

        return view('temas.show', compact('manual', 'actual'));
    }
}
