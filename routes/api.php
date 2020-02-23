<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "åapi" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('random')->group(function () {
    Route::post('number', 'API\RandomController@number');
    Route::post('list', 'API\RandomController@list');
    Route::post('group', 'API\RandomController@group');
    Route::post('element', 'API\RandomController@element');
});
