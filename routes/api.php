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
    Route::post('client', 'ApiController@client'); 
    Route::post('logout', 'ApiController@logout'); 
    Route::post('listProductNew', 'ApiController@listProductNew');
    Route::post('listProductBestSelling', 'ApiController@listProductBestSelling'); 
    Route::post('bestSellProduct', 'ApiController@bestSellProduct');
    Route::post('bestExpensiveProduct', 'ApiController@bestExpensiveProduct');  
    Route::post('getCategory', 'ApiController@getCategory');  
    Route::post('getFunctionality', 'ApiController@getFunctionality');  
    Route::post('productList', 'ApiController@productList');
    Route::post('getSearch', 'ApiController@getSearch');
    Route::post('getImage', 'ApiController@getImage');
    Route::post('getComment', 'ApiController@getComment');
    Route::post('getDetailProduct', 'ApiController@getDetailProduct');
    Route::post('getMore', 'ApiController@getMore');
    
});

Route::middleware('jwt.refresh')->get('/token/refresh', 'ApiController@refresh');
