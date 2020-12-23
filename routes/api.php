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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('signup', 'ApiController@register'); 
Route::post('login', 'ApiController@login');

Route::middleware(['assign.guard:api','jwt.auth'])->group( function () { 
    Route::get('client', 'ApiController@client'); 
    Route::post('logout', 'ApiController@logout'); 
});

Route::middleware('jwt.refresh')->get('/token/refresh', 'ApiController@refresh');
