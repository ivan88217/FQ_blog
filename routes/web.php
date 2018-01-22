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
Route::get('/manager', "home@manager");
Route::post('/insert',"home@insert");
Route::get('/newA', "home@newA");
Route::get('/delete/{id}', "home@delete");
Route::get('/content/{id}', "home@content");
Route::post('/update',"home@update");
Route::post('/edit',"home@edit");
Route::post('/deleteAll',"home@deleteAll");