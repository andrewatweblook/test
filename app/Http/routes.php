<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/index','Home@index');
Route::get('/about','Home@about');
Route::get('/contact','Home@contact');
Route::get('/register','User@register');
Route::post('/register_process','User@register_process');
Route::get('/login','User@login');
Route::post('/login_process','User@login_process');
Route::get('/dashboard','User@dashboard');
Route::post('/profile_process','User@profile_process');
Route::get('/logout','User@logout');
Route::post('/gallery_process','User@gallery_process');
Route::get('/model_insert','Model@model_insert');
Route::get('/model_update/{id}','Model@model_update');
Route::get('/model_delete/{id}','Model@model_delete');
Route::post('/model_insert_process','Model@model_insert_process');
Route::post('/model_update_process','Model@model_update_process');



