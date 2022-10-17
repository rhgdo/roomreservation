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

Route::get('/', 'ReservationsController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
//        Route::get('reserved', 'UsersController@reserved')->name('users.reserved');    // 追加削除予定
    });

    // ゲストにはユーザ一覧とユーザ詳細を非表示    
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);

 
    Route::get('reservations/{reservation}', 'ReservationsController@show')->name('reservations.show');
    Route::post('reserved/{reservation}', 'ReservationsController@store')->name('reservations.store');
    
    // ゲストには非表示?    
    Route::resource('reservations', 'ReservationsController', ['only' => ['index', 'show']]);
    
    
});

