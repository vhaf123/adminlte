<?php

use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;

Auth::routes();

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', 'HomeController@index')->name('home');

Route::get('cursos/categorias/{categoria}', 'CategoriaController@show')->name('categorias.show');


/* Route::get('cursos/categoria/{categoria}', 'CursoController@categoria')->name('cursos.categoria'); */
Route::resource('cursos', 'CursoController')->only('index', 'show');
Route::post('cursos/{curso}/matricular', 'CursoController@matricular')->name('cursos.matricular');
Route::post('cursos/{curso}/review', 'CursoController@review')->name('cursos.review');



Route::get('/recursos/{video}', 'RecursoController@show')->name('recursos.show');
Route::get('/recursos/{video}/download', 'RecursoController@download')->name('recursos.download');

Route::get('course-status/{curso}', 'CourseStatusController@index')->name('course-status.index');
Route::post('course-status/avance/{curso}', 'CourseStatusController@avance')->name('course-status.avance');
Route::post('course-status/actual/{curso}', 'CourseStatusController@actual')->name('course-status.actual');
Route::post('course-status/cursado', 'CourseStatusController@cursado')->name('course-status.cursado');

Route::resource('manuales', 'ManualController')->parameters(['manuales' => 'manual'])->only('index', 'show');
Route::get('manuales/{manual}/{tema}', 'TemaController@show')->name('temas.show');

Route::get('contactanos', 'ContactanosController@index')->name('contactanos.index');
Route::post('contactanos/mensaje', 'ContactanosController@mensaje')->name('contactanos.mensaje');

Route::resource('blog', 'BlogController')->parameters(['blog' => 'post'])->only('index', 'show');

Route::get('politicas', function () {
    
})->name('politicas.index');

Route::get('politicas', function () {
    return view('politicas');
})->name('politicas');

Route::get('terminos', function () {
    return view('terminos');
})->name('terminos');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
    
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::resource('users', 'UserController')->except('create', 'store', 'destroy')->names('admin.users');

    Route::resource('categorias', 'CategoriaController')->names('admin.categorias');
    Route::post('categorias/{categoria}/dropzone', 'CategoriaController@dropzone')->name('admin.categorias.dropzone');

    Route::resource('cursos', 'CursoController')->names('admin.cursos');
    Route::post('cursos/{curso}/dropzone', 'CursoController@dropzone')->name('admin.cursos.dropzone');
    Route::post('cursos/{curso}/status', 'CursoController@status')->name('admin.cursos.status');

    Route::delete('recursos/{video}', 'RecursoController@destroy')->name('admin.recursos.destroy');

    Route::resource('metas', 'MetaController')->names('admin.metas')->only(['store', 'update', 'destroy']);
    Route::resource('modulos', 'ModuloController')->names('admin.modulos')->only(['store', 'update', 'destroy']);
    Route::resource('videos', 'VideoController')->names('admin.videos')->only(['store', 'update', 'destroy', 'edit']);
    Route::resource('requisitos', 'RequisitoController')->names('admin.requisitos')->only(['store', 'update', 'destroy']);
    
    Route::resource('manuales', 'ManualController')->names('admin.manuales')->parameters(['manuales' => 'manual']);
    Route::post('manuales/{manual}/status', 'ManualController@status')->name('admin.manuales.status');

    Route::resource('capitulos', 'CapituloController')->names('admin.capitulos')->except('index', 'create');
    /* ->only(['store', 'update', 'destroy']); */
    Route::resource('temas', 'TemaController')->names('admin.temas')->except('index', 'create', 'show');
    Route::post('temas/{tema}/dropzone', 'TemaController@dropzone')->name('admin.temas.dropzone');
    
    Route::delete('images/{image}', 'ImageController@destroy')->name('admin.images.destroy');

    Route::resource('posts', 'PostController')->names('admin.posts')->except('show');
    Route::post('posts/{post}/dropzone', 'PostController@dropzone')->name('admin.posts.dropzone');
    Route::post('posts/{post}/status', 'PostController@status')->name('admin.posts.status');
    Route::get('posts/{post}/vista', 'PostController@vista')->name('admin.posts.vista');
    
});