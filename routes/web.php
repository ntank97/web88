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
    return view('auth.login');
});

Auth::routes();

Route::group(['prefix' => 'admin'],function(){
    /*
     * Admin đăng nhập
     */
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.showLoginForm');
    Route::post('login', 'Auth\LoginController@postLogin')->name('admin.login_post');
    /*
     * Admin đăng xuất
     */
    Route::get('logout','Auth\LogoutController@logout')->name('admin.logout');
});

Route::group(['prefix' => 'admin','middleware' => 'CheckAdmin'],function(){
    Route::get('/','HomeController@index')->name('admin.dashboard');
    Route::get('/dashboard','HomeController@index');
    Route::group(['prefix' => 'account'],function(){
        Route::get('account','Admin\AcountController@admin')->name('admin.account.index');
        Route::get('account','Admin\AcountController@user')->name('user.account.index');
    });
});

