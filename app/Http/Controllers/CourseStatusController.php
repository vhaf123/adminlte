<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Video;

class CourseStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Curso $curso){
        $this->authorize('matriculado', $curso);
        return view('course-status.index', compact('curso'));
    }

    public function indice(Request $request, Curso $curso){

        if($request->get('id')){

            foreach ($curso->modulos as $modulo) {
                
                foreach ($modulo->videos as $video) {

                    if($video->users->contains(auth()->user()->id)){
                        $video['visto'] = true;
                    }else{
                        $video['visto'] = false;
                    }

                    if($video->id == $request->get('id')){
                        $video['actual'] = true;
                    }else{
                        $video['actual'] = false;
                    }
                    
                }
            }

            return $curso;

        }else{
            $i = 0;
            $j = 0;

            foreach ($curso->modulos as $modulo) {
                
                foreach ($modulo->videos as $video) {

                    $j++;

                    if($video->users->contains(auth()->user()->id)){
                        $video['visto'] = true;

                        if($i == 0 && $j == $curso->videos_count){

                            $video['actual'] = true;

                        }else{

                            $video['actual'] = false;

                        }

                    }else{
                        
                        $i++;
                        $video['visto'] = false;

                        if($i == 1){
                            $video['actual'] = true;
                        }else{
                            $video['actual'] = false;
                        }
                    }
                }
            }

            return $curso;
        }
    }

    public function avance(Curso $curso){

        $videos = $curso->videos;

        $i = 0;

        foreach ($videos as $video) {
            if($video->users->contains(auth()->user()->id)){
                $i++;
            }
        }

        $avance = ($i * 100)/($videos->count());

        return round($avance, 2);

    }

    public function actual(Request $request, Curso $curso){
        
        if($request->get('id')){

            $i = 0;

            foreach ($curso->videos as $video) {
                $i++;

                if($video->id == $request->get('id')){

                    if($i == 1){
                        $video['anterior'] = null;
                    }else{
                        $video['anterior'] = $curso->videos[$i-2]->id;
                    }

                    if($i == $curso->videos_count){

                        $video['next'] = null;

                    }else{
                        $video['next'] = $curso->videos[$i]->id;
                    }

                    if($video->users->contains(auth()->user()->id)){

                        $video['actual'] = true;

                    }else{

                        $video['actual'] = false;

                    }

                    return $video;
                }

                /* if($video->users->contains(auth()->user()->id)){

                    if($i == $curso->videos_count){

                        $video['next'] = null;
                        $video['anterior'] = $curso->videos[$i-2]->id;
                        $video['actual'] = true;
                        return $video;
                    }

                }else{

                    if($i == 1){
                        $video['anterior'] = null;
                    }else{
                        $video['anterior'] = $curso->videos[$i-2]->id;
                    }

                    if($i == $curso->videos_count){

                        $video['next'] = null;

                    }else{
                        $video['next'] = $curso->videos[$i]->id;
                    }

                    $video['actual'] = false;

                    return $video;

                } */
            }

        }else{

            $i = 0;

            foreach ($curso->videos as $video) {
                $i++;

                if($video->users->contains(auth()->user()->id)){

                    if($i == $curso->videos_count){

                        $video['next'] = null;
                        $video['anterior'] = $curso->videos[$i-2]->id;
                        $video['actual'] = true;
                        return $video;
                    }

                }else{

                    if($i == 1){
                        $video['anterior'] = null;
                    }else{
                        $video['anterior'] = $curso->videos[$i-2]->id;
                    }

                    if($i == $curso->videos_count){

                        $video['next'] = null;

                    }else{
                        $video['next'] = $curso->videos[$i]->id;
                    }

                    $video['actual'] = false;

                    return $video;

                }
            }
        }
       
    }

    public function visto(Request $request){

        $video = Video::find($request->get('id'));

        if($request->get('checked')){
            $video->users()->attach(auth()->user()->id);
        }else{
            $video->users()->detach(auth()->user()->id);
        }
    }
}
