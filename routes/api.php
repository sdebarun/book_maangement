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
// Route::get('/test',function(){
//     return "Hello world";
// });
// Route::post('/login','Auth\LoginController@authenticate');
// Route::post('/logout','Auth\LoginController@logout');
// Route::post('userdetails', 'AuthController@getAuthenticatedUser');

Route::post('login', 'AuthController@login');
Route::group(['prefix' => 'jwt','middleware' => 'jwt.auth'], function ($router) {

    
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('userdetails', 'AuthController@getAuthenticatedUser');
    Route::get('/viewallpublisher','apiController\PublisherController@listallpublishers');

});
