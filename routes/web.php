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
//*************** Phan frontend *****************
Route::get('/', function () {
    return view('website');
});

//*************** Phan Admin *****************

Route::get('admin/login', [
    'as' => 'login',
    'uses' => 'Admin\LoginController@viewLogin',
]);
Route::post('admin/login', [
    'as' => 'loginAdmin',
    'uses' => 'Admin\LoginController@postLogin',
]);

Route::get('admin/logOut', 'Admin\LoginController@adminLogOut');

Route::group(['prefix' => 'admin', 'middleware' => ['adminLogin', 'locale']], function () {
    Route::resource('dashboard', 'Admin\DashboardController');
    Route::get('change-language/{lang}', [
        'as' => 'change_lang',
        'uses' => 'Admin\DashboardController@changeLang',
    ]);

    Route::resource('apartments', 'Admin\ApartmentController');
});
