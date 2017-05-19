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

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/home/saveBattleInfo', 'HomeController@saveBattleInfo');

Route::post('/home/saveBattleScore/{id}', 'HomeController@saveBattleScore');

Route::post('/home/publishBattle/{id}', 'HomeController@publishBattle');

Route::post('/home/delete/{id}', 'HomeController@destroy');

Route::post('/home/saveEditBattle/{id}', 'HomeController@saveEditBattle');

Route::post('/home/saveBetting/{battle_id}/{user_id}', 'HomeController@saveBetting');

Route::get('/home/getBattleInfo', 'HomeController@getBattleInfo');

Route::get('/home/checkIfBeAbleToDelete', 'HomeController@checkIfBeAbleToDelete');

Route::get('/home/getUserHistory', 'HomeController@getUserHistory');

Route::get('/home/service', 'HomeController@service');



