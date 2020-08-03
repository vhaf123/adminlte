<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::get('cursos/categorias/{categoria}', 'CategoriaController@show')->name('categorias.show');

Route::resource('cursos', 'CursoController')->only('index', 'show');
Route::post('cursos/{curso}/matricular', 'CursoController@matricular')->name('cursos.matricular');
Route::post('cursos/{curso}/review', 'CursoController@review')->name('cursos.review');

Route::get('course-status/{curso}', 'CourseStatusController@index')->name('course-status.index');
Route::post('course-status/avance/{curso}', 'CourseStatusController@avance')->name('course-status.avance');
Route::post('course-status/actual/{curso}', 'CourseStatusController@actual')->name('course-status.actual');
Route::post('course-status/cursado', 'CourseStatusController@cursado')->name('course-status.cursado');

Route::get('/recursos/{video}', 'RecursoController@show')->name('recursos.show');
Route::get('/recursos/{video}/download', 'RecursoController@download')->name('recursos.download');

Route::resource('manuales', 'ManualController')->parameters(['manuales' => 'manual'])->only('index', 'show');
Route::get('manuales/{manual}/{tema}', 'TemaController@show')->name('temas.show');

Route::get('contactanos', 'ContactanosController@index')->name('contactanos.index');
Route::post('contactanos/mensaje', 'ContactanosController@mensaje')->name('contactanos.mensaje');

Route::resource('blog', 'BlogController')->parameters(['blog' => 'post'])->only('index', 'show');

Route::get('tags/{tag}', 'TagController@show')->name('tags.show');


Route::get('politicas', function () {
    return view('politicas');
})->name('politicas');

Route::get('terminos', function () {
    return view('terminos');
})->name('terminos');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});