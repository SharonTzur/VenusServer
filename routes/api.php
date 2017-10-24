<?php

use App\LearningResource;
use App\Level;
use App\User;
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
        'as' => 'auth.login',
        'uses' => 'Auth\LoginController@login',
    ]);

    Route::post('/reset/', [
        'as' => 'auth.password.reset',
        'uses' => 'Auth\ResetPasswordController@reset',
    ]);

    Route::post('/register/', [
        'as' => 'auth.register',
        'uses' => 'Auth\RegisterController@register',
    ]);

    Route::post('/forgot/', [
        'as' => 'auth.password.forgot',
        'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail',
    ]);

});


// First version
Route::group(['prefix' => '/v1/'], function () {

    // Authenticated requests
    Route::group(['middleware' => 'auth'], function () {

        // User
        Route::group(['prefix' => '/users/'], function () {

            Route::get('/', [
                'as' => 'user.list',
                'uses' => 'UserController@list',
            ]);

            Route::get('/{id}', [
                'as' => 'user.find',
                'uses' => 'UserController@find',
            ]);

            //  get all of the learning resources that a specific user has
            Route::get('/{id}/learningResources', [
                'as' => 'auth.login',
                'uses' => 'UserController@findLearningResources',
            ]);        });

        // Levels
        Route::group(['prefix' => '/levels/'], function () {

            Route::get('/', [
                'as' => 'level.list',
                'uses' => 'LevelController@list',
            ]);

            Route::get('/{id}', [
                'as' => 'level.find',
                'uses' => 'LevelController@find',
            ]);

            Route::get('/{id}/learningResources', [
                'as' => 'level.learningResources',
                'uses' => 'LevelController@findLearningResources',
            ]);

        });

        // LearningResources
        Route::group(['prefix' => '/learningResources/'], function () {

            Route::get('/', [
                'as' => 'learningResource.list',
                'uses' => 'LearningResourceController@list',
            ]);

            Route::get('/{id}', [
                'as' => 'learningResource.find',
                'uses' => 'LearningResourceController@find',
            ]);

            Route::get('/{id}/users', [
                'as' => 'learningResource.findUsers',
                'uses' => 'LearningResourceController@findUsers',
            ]);

        });
    });
});