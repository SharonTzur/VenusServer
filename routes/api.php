<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

// Authentication
Route::group(['prefix' => 'auth/'], function () {

    Route::post('/login/', [
        'as'   => 'auth.login',
        'uses' => 'Auth\LoginController@login',
    ]);

    Route::post('/reset/', [
        'as'   => 'auth.password.reset',
        'uses' => 'Auth\ResetPasswordController@reset',
    ]);

    Route::post('/register/', [
        'as'   => 'auth.register',
        'uses' => 'Auth\RegisterController@register',
    ]);

    Route::post('/forgot/', [
        'as'   => 'auth.password.forgot',
        'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail',
    ]);

});