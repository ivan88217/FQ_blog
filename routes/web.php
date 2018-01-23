<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', "home@index");
Route::get('/index', "home@index");
Route::post('/search', "home@search");
Route::get('/index/{cls}', "home@index1");
Route::get('/manager', "home@manager");
Route::post('/insert',"home@insert");
Route::get('/newA', "home@newA");
Route::get('/delete/{id}', "home@delete");
Route::post('/edit',"home@edit");
Route::post('/deleteAll',"home@deleteAll");

Route::post('/contedit',"content@contedit");
Route::get('/contdelete/{id}',"content@contdelete");
Route::post('/update',"content@update");
Route::get('/indexcontent/{id}', "content@indexcontent");
Route::get('/content/{id}', "content@content");