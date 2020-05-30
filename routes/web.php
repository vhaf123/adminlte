<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', 'HomeController@index')->name('home');

Route::resource('cursos', 'CursoController')->only('index', 'show');
Route::post('cursos/{curso}/matricular', 'CursoController@matricular')->name('cursos.matricular');
Route::post('cursos/{curso}/review', 'CursoController@review')->name('cursos.review');

Route::get('course-status/{curso}', 'CourseStatusController@index')->name('course-status.index');
Route::post('course-status/indice/{curso}', 'CourseStatusController@indice')->name('course-status.indice');
Route::post('course-status/avance/{curso}', 'CourseStatusController@avance')->name('course-status.avance');
Route::post('course-status/actual/{curso}', 'CourseStatusController@actual')->name('course-status.actual');
Route::post('course-status/visto', 'CourseStatusController@visto')->name('course-status.visto');

Route::resource('manuales', 'ManualController')->parameters(['manuales' => 'manual']);

Route::get('contactanos', 'ContactanosController@index')->name('contactanos.index');

Route::resource('blog', 'BlogController')->parameters(['blog' => 'post']);