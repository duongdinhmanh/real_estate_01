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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => ['adminLogin', 'locale']], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('admin');
    Route::get('change-language/{lang}', [
        'as' => 'change_lang',
        'uses' => 'Admin\DashboardController@change_lang',
    ]);
    // code tiếp theo
});

//category
Route::resource('/categories', 'Admin\CategoryController')->except(['show']);
//hidden and show status of category
Route::post('hidden_status_categories/{id?}', 'Admin\CategoryController@hidden_status_categories')->name('hidden_status_categories');
Route::post('show_status_categories/{id?}', 'Admin\CategoryController@show_status_categories')->name('show_status_categories');
