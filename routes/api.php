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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::resource('users', 'AuthController');

Route::get('register', 'AuthController@register');
Route::post('register', 'AuthController@store');
Route::post('login', 'AuthController@login');
Route::get('states/{country}', 'CountryController@states');
Route::get('cities/{state}', 'StateController@cities');
Route::get('castes/{religion}', 'ReligionController@castes');

//Route::group(['prefix' => 'auth'], function () {
//   // Route::post('/login','AuthController@authenticate');
//    Route::post('login', 'AuthController@login');
//    Route::post('/logout','AuthController@logout');
//    Route::post('/check','AuthController@check');
//    //Route::post('/register','AuthController@register');
//    Route::get('/activate/{token}','AuthController@activate');
//    Route::post('/password','AuthController@password');
//    Route::post('/validate-password-reset','AuthController@validatePasswordReset');
//    Route::post('/reset','AuthController@reset');
//    Route::post('/social/token','SocialAuthController@getToken');
//});


Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'AuthController@logout');
    Route::post('check', 'AuthController@check');
    Route::get('user/profile', 'AuthController@getAuthUser');
    Route::get('user/profile/edit', 'AuthController@editProfile');
    Route::post('user/profile', 'AuthController@updateProfile');

    Route::get('products', 'ProductController@index');
    Route::get('products/{id}', 'ProductController@show');
    Route::post('products', 'ProductController@store');
    Route::put('products/{id}', 'ProductController@update');
    Route::delete('products/{id}', 'ProductController@destroy');
});
