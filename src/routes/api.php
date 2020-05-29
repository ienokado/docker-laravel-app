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
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login')->name('api.auth.login');
    Route::post('logout', 'AuthController@logout')->name('api.auth.logout');
    Route::post('refresh', 'AuthController@refresh')->name('api.auth.refresh');
    Route::post('me', 'AuthController@me')->name('api.auth.me');
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('debayashi/search', 'Debayashi\SearchController@index')->name('api.debayashi.search');
});
