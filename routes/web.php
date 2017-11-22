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

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');

Route::resource('/task', 'TasksController');
Route::get('/task', 'TasksController@index');
Route::post('/task', 'TasksController@store');
Route::put('/task/complete/{task}', 'TasksController@completeTask');
Route::put('/task/completed/{task}', 'TasksController@completedTask');

