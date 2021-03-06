<?php

use App\Http\Controllers\UserController;
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

Route::prefix('auth')->group(function () {
    Route::post('login', 'AuthController@login');
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', 'AuthController@logout');
    });
});

Route::middleware('auth:api')->group(function () {
    //
});
