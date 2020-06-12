<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Curso;
use App\Manual;
use App\Modulo;
use App\Post;
use App\Tema;

use App\Capitulo;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('search/autocomplete', function (Request $request) {

    $term = $request->get('term');

    $queries_curso = Curso::where('name', 'LIKE', '%'. $term .'%')
                    ->where('status', '!=', 1)
                    ->orderBy('name','ASC')
                    ->take(3)
                    ->get();
    
    $results = [];

    foreach ($queries_curso as $query) {
        $results[] = [
                'type' => 'curso',
                'slug' => $query->slug ,
                'label' => 'Curso: ' . $query->name
            ];
    }

    $queries_manuales = Manual::where('name', 'LIKE', '%'.$term.'%')
                    ->where('status', '!=', 1)
                    ->orderBy('name','ASC')
                    ->take(3)
                    ->get();
    
    foreach ($queries_manuales as $query) {
        $results[] = [
                'type' => 'manual',
                'slug' => $query->slug ,
                'label' => 'Manual: ' . $query->name
            ];
    }

    $queries_posts = Post::where('name', 'LIKE', '%'.$term.'%')
                    ->where('status', '!=', 1)
                    ->orderBy('name','ASC')
                    ->take(3)
                    ->get();
    
    foreach ($queries_posts as $query) {
        $results[] = [
                'type' => 'post',
                'slug' => $query->slug ,
                'label' => 'Post: ' . $query->name
            ];
    }
    

    if(!count($results)){
        $results[] = [
            
            'label' => 'No existe ningún registro ...'
        ];
    }


    return $results;

});

Route::post('cursos/{curso}', function (Curso $curso) {
    
    $curso->metas;
    $curso->requisitos;
    $curso->modulos;

    foreach ($curso->modulos as $modulo) {
        $modulo->videos;
    }

    return $curso;

})->name('api.cursos');

Route::post('modulos/{id}', function ($id) {
    
    $modulo = Modulo::find($id);
    $modulo->videos;
    return $modulo;

})->name('api.modulos');


Route::get('manuales/{manual}', function (Manual $manual) {

    foreach ($manual->capitulos as $capitulo) {
        $capitulo->temas;
    }
    //$manual->capitulos;

    return $manual;
    
})->name('api.manuales');


Route::get('capitulos/{capitulo}', function (Capitulo $capitulo) {
    
    $capitulo->temas;

    return $capitulo;

})->name('api.capitulos');



Route::get('temas/{tema}', function (Tema $tema) {
    return $tema;
});