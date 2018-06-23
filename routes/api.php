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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    Route::get('/trainer/{id}', 'ClientController@index');
    Route::post('/client/create', 'ClientController@store');
    Route::put('/client/edit/{client}', 'ClientController@edit');
    Route::delete('/client/delete/{client}', 'ClientController@delete');
    Route::post('/exercise/create', 'ExerciseController@store');
    Route::put('/exercise/edit/{exercise}', 'ExerciseController@edit');
    Route::delete('/exercise/delete/{exercise}', 'ExerciseController@delete');
    Route::post('/trainer/create', 'TrainerController@store');


});