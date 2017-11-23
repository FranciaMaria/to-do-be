<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

/*header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

//Auth::routes();
//Route::middleware('api')->get('/home', 'HomeController@index')->name('home');
Route::middleware('api')->resource('/task', 'TasksController');
Route::middleware('api')->get('/task', 'TasksController@index');
Route::middleware('api')->post('/task', 'TasksController@store');
Route::middleware('api')->put('/task/complete/{task}', 'TasksController@completeTask');
Route::middleware('api')->put('/task/completed/{task}', 'TasksController@completedTask');*/

/*Route::resource('/task', 'TasksController');
Route::get('/task/', 'TasksController@index');
Route::put('/task/complete/{task}', 'TasksController@completeTask');
Route::put('/task/completed/{task}', 'TasksController@completedTask');
*/

//Route::middleware('api')->resource('/task', 'TasksController');
Auth::routes();

Route::middleware('api')->post('/register', 'Auth\RegisterController@create');
Route::middleware('api')->post('/login', 'Auth\LoginController@create');
Route::middleware('api')->get('/task', 'TasksController@index');
Route::middleware('api')->post('/task', 'TasksController@store');
Route::middleware('api')->put('/task/{task}', 'TasksController@update');
Route::middleware('api')->delete('/task/{task}', 'TasksController@destroy');
Route::middleware('api')->put('/task/complete/{task}', 'TasksController@completeTask');
Route::middleware('api')->put('/task/completed/{task}', 'TasksController@completedTask');


