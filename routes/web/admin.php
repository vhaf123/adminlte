<?php

use Illuminate\Support\Facades\Route;
    
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

Route::resource('tags', 'TagController')->names('admin.tags');