<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/','HomeController@index');
Route::get('/search','HomeController@search');
Route::get('/post/{slug}','HomeController@post');
Route::get('/page/{page}','HomeController@page');
Route::get('/category/{category}','HomeController@category');


Route::get('/admin','AdminController@index');
Route::get('/admin/logout','AdminController@logout');
Route::get('/admin/dashboard','AdminController@dashboard');
Route::get('/admin/create-post','AdminController@create_post');
Route::get('/admin/all-posts','AdminController@all_post');
Route::get('/admin/add-page','AdminController@add_page');
Route::get('/admin/edit-post/{id}','AdminController@edit_post');
Route::post('/admin/auth','AdminController@auth');

Route::post('/admin/submit-post','AdminController@submit_post');
Route::post('/admin/submit-page','AdminController@submit_page');
Route::post('/admin/update-post','AdminController@update_post');



