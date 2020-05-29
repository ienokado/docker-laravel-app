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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'TopController')->name('top');

Route::group(['prefix' => 'debayashi', 'as' => 'debayashi.'], function () {
    Route::post('search','Debayashi\SearchController@index')->name('search')->middleware('request.logger');
    Route::match(['get', 'post'], 'history','Debayashi\HistoryController@index')->name('history');
    Route::get('ranking','Debayashi\RankingController@index')->name('ranking');
});
