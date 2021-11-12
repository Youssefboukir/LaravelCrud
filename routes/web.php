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


Route::get('/', function () {
    return view('welcome');
});
Route::get('/Addetudiant', function () {
    return view('Etudiant.Add');
});



Auth::routes();
Route::get("/home","EtudiantController@index")->middleware(["auth"]);
Route::POST("etudiant/Add","EtudiantController@store");
Route::PUT("etudiant/update","EtudiantController@update");
Route::get("etudiant/edit/{id}","EtudiantController@edit");
Route::get("etudiant/delete/{id}","EtudiantController@Delete");
