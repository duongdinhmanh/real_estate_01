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
    'uses' => 'Admin\loginController@ViewLogin',
]);
Route::post('admin/login', [
    'as' => 'LoginAdmin',
    'uses' => 'Admin\loginController@PostLogin',
]);

Route::get('admin/logOut', 'Admin\loginController@AdminlogOut');

Route::group(['prefix' => 'admin', 'middleware' => ['adminLogin', 'locale']], function () {
    Route::resource('dashboard', 'Admin\DashboardController');
    Route::get('change-language/{lang}', [
        'as' => 'change_lang',
        'uses' => 'Admin\DashboardController@change_lang',
    ]);

    Route::resource('apartments', 'Admin\ApartmentController');
});
