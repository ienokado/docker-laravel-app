<?php
// SSL設定
if (App::environment('production')) {
    URL::forceScheme('https');
}
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'guest:admin'], function() {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login.form');
    Route::post('/login', 'Auth\LoginController@login')->name('login');

    Route::get('/404', function () { return view('admin.404'); });
    Route::get('/500', function () { return view('admin.500'); });
});

Route::group(['middleware' => 'auth:admin'], function(){
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/', 'TopController@index')->name('top');

    Route::get('/debayashi', 'DebayashiController@index')->name('debayashi');
    Route::get('/debayashi/new', 'DebayashiController@edit')->name('debayashi.new');
    Route::get('/debayashi/{id}/edit', 'DebayashiController@edit')->name('debayashi.edit');
    Route::post('/debayashi/store', 'DebayashiController@store')->name('debayashi.store');

    Route::get('/system/log', 'LogController@index')->name('system.log');
});
