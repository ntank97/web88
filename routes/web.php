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

Route::get('/','HomeController@index')->name('home');

Route::group(['prefix' => 'kho-giao-dien'], function (){
   route::get('/','frontendcontroller@khogiaodien')->name('kho.giao.dien');
});

route::get('lien-he','frontendcontroller@lienhe')->name('lien.he');

route::get('/khach-hang','frontendcontroller@khachhang')->name('khach.hang');

Route::get('seo','FrontendController@seo')->name('seo');

route::get('thiet-ke-website','frontendcontroller@thietkewesite')->name('thiet.ke.wesite');

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
    Route::get('/','AdminController@index')->name('admin.dashboard');
    Route::get('/dashboard','AdminController@index');
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

        Route::group(['prefix' => 'pending'],function(){
            Route::get('web/{id}','PendingController@web')->name('pending.edit');
            Route::get('blogs/{id}','PendingController@blogs')->name('pending.blogs.edit');
            Route::get('service/{id}','PendingController@service')->name('pending.service.edit');
        });
    });

    Route::prefix('partner')->group(function(){
        Route::get('list','PartnerController@list')->name('partner.list');
        Route::get('add','PartnerController@add')->name('partner.add');
        Route::post('add','PartnerController@store')->name('partner.add');
        Route::get('edit/{id}','PartnerController@edit')->name('partner.edit');
        Route::post('edit/{id}','PartnerController@update')->name('partner.edit');
        Route::get('delete/{id}','PartnerController@delete')->name('partner.delete');
    });

    Route::prefix('blogs')->group(function(){
        Route::get('list','BlogsController@list')->name('blogs.list');
        Route::get('add','BlogsController@add')->name('blogs.add');
        Route::post('add','BlogsController@store')->name('blogs.add');
        Route::get('edit/{id}','BlogsController@edit')->name('blogs.edit');
        Route::post('edit/{id}','BlogsController@update')->name('blogs.edit');
        Route::get('delete/{id}','BlogsController@delete')->name('blogs.delete');
    });

    
});

