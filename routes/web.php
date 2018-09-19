<?php

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

Route::get('/', 'IndexController@index' );
Route::get('/login', 'CustomLoginController@loginPage' );
Route::get('/logout', 'CustomLoginController@logout' );
Route::post('/loginUser', 'CustomLoginController@loginUser' );


Route::group(['middleware' => 'userAuth'], function () {
    Route::get('/edit/{id?}', 'EditController@createAd');
    Route::post('/saveAd', 'EditController@saveAd');
    Route::get('/delete/{id}', 'EditController@deleteAd');
});
Route::get('/{id}', 'IndexController@showAd' );

