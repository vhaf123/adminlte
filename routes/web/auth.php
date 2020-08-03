<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');