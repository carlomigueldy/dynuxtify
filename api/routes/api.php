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

// Auth routes
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\AuthController@login');
    Route::post('register', 'Auth\AuthController@register');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'Auth\AuthController@logout');
        Route::get('user', 'Auth\AuthController@user');
    });
});

// System routes
Route::group([
    'middleware' => 'auth:api',
], function () {
    // API Resources
    Route::apiResources([
        'users' => 'Modules\Users\UserController',
    ]);

    // Roles
    Route::apiResource('roles', 'Modules\Roles\RoleController')->only(['index']);

    // Archived users
    Route::get('users-archived/restore/{id}', 'Modules\Users\UserController@restore');
    Route::apiResource('users-archived', 'Modules\Users\ArchivedUserController')->only([
        'index',
        'show',
        'destroy'
    ]);
});
