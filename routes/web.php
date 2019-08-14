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
    /*
     * Tài khoản
     */
    Route::prefix('account')->group(function (){
        
        Route::group(['prefix' => 'editor'],function(){
            Route::get('profile','AccountController@profile')->name('editor.account.profile');
            Route::post('add','AccountController@store')->name('editor.account.store');
            Route::get('edit/{id}','AccountController@edit')->name('editor.account.edit');
            Route::post('update/{id}','AccountController@update')->name('editor.account.update');
            Route::get('delete/{id}','AccountController@delete')->name('editor.account.delete');
        });

        Route::group(['prefix' => 'user'],function(){
            Route::get('profile','ClientController@profile')->name('editor.account.index');
            Route::post('add','ClientController@store')->name('user.account.store');
            Route::get('edit/{id}','ClientController@edit')->name('user.account.edit');
            Route::post('edit/{id}','ClientController@update')->name('user.account.update');
            Route::get('delete/{id}','ClientController@delete')->name('user.account.delete');
        });
    });
});

