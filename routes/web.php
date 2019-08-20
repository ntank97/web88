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

            Route::post('update_pending','WebStoreController@update_pending')->name('update_pending');
            Route::post('update_pending_blogs','WebStoreController@update_pending_blogs')->name('update_pending_blogs');
            Route::post('update_pending_services','WebStoreController@update_pending_services')->name('update_pending_services');
        });

        Route::group(['prefix' => 'user'],function(){
            Route::get('profile','ClientController@profile')->name('editor.account.index');
            Route::post('add','ClientController@store')->name('user.account.store');
            Route::get('edit/{id}','ClientController@edit')->name('user.account.edit');
            Route::post('edit/{id}','ClientController@update')->name('user.account.update');
            Route::get('delete/{id}','ClientController@delete')->name('user.account.delete');
        });

    });
    
    Route::prefix('web_users')->group(function(){
        Route::get('list','WebUsersController@list')->name('web_users.contact');
        Route::post('edit_pending','WebUsersController@edit_pending')->name('edit_pending');
        Route::get('detail/{web_id}/{users_id}','WebUsersController@detail')->name('detail');
    });

    Route::prefix('partner')->group(function(){
        Route::get('list','PartnerController@list')->name('partner.list');
        Route::get('add','PartnerController@add')->name('partner.add');
        Route::post('add','PartnerController@store')->name('partner.add');
        Route::get('edit/{id}','PartnerController@edit')->name('partner.edit');
        Route::post('edit/{id}','PartnerController@update')->name('partner.edit');
        Route::get('delete/{id}','PartnerController@delete')->name('partner.delete');
    });

    Route::prefix('contact')->group(function(){
        Route::get('list','ContactController@list')->name('contact.list');
        Route::get('add','ContactController@add')->name('contact.add');
        Route::post('add','ContactController@store')->name('contact.add');
        Route::get('edit/{id}','ContactController@edit')->name('contact.edit');
        Route::post('edit/{id}','ContactController@update')->name('contact.edit');
        Route::get('delete/{id}','ContactController@delete')->name('contact.delete');
    });

    Route::prefix('supports')->group(function(){
        Route::get('list','SupportsController@list')->name('supports.list');
        Route::get('add','SupportsController@add')->name('supports.add');
        Route::post('add','SupportsController@store')->name('supports.add');
        Route::get('edit/{id}','SupportsController@edit')->name('supports.edit');
        Route::post('edit/{id}','SupportsController@update')->name('supports.edit');
        Route::get('delete/{id}','SupportsController@delete')->name('supports.delete');
    });

    Route::prefix('blogs')->group(function(){
        Route::get('list','BlogsController@list')->name('blogs.list');
        Route::get('add','BlogsController@add')->name('blogs.add');
        Route::post('add','BlogsController@store')->name('blogs.add');
        Route::get('edit/{id}','BlogsController@edit')->name('blogs.edit');
        Route::post('edit/{id}','BlogsController@update')->name('blogs.edit');
        Route::get('delete/{id}','BlogsController@delete')->name('blogs.delete');
    });
    //    News
    Route::prefix('web-store')->group(function () {
        Route::get('/list', 'WebStoreController@index')->name('webstore.index');

        Route::get('/add', 'WebStoreController@create')->name('webstore.create');
        Route::post('/add', 'WebStoreController@store')->name('webstore.store');

        Route::get('/add-cate', 'WebStoreController@createCate')->name('webstore.createCate');
        Route::post('/add-cate', 'WebStoreController@storeCate')->name('webstore.storeCate');

        Route::get('/edit/{id}', 'WebStoreController@edit')->name('webstore.edit');
        Route::post('/edit/{id}', 'WebStoreController@update')->name('webstore.update');

        Route::get('/destroy/{id}', 'WebStoreController@destroy')->name('webstore.destroy');
        Route::get('/destroy-cate/{id}', 'WebStoreController@destroyCate')->name('webstore.destroyCate');

        Route::get('/show/{id}', 'WebStoreController@show')->name('webstore.show');

        Route::get('/detail/{id}', 'WebStoreController@detail')->name('webstore.detail');
        Route::get('/setactive/{id}/{status}', 'WebStoreController@setactive')->name('webstore.setactive');
        Route::get('/setactive-cate/{id}/{status}', 'WebStoreController@setactiveCate')->name('webstore.setactiveCate');


    });
//    Service
    Route::prefix('service')->group(function () {
        Route::get('/list', 'ServiceController@index')->name('service.index');

        Route::get('/add', 'ServiceController@create')->name('service.create');
        Route::post('/add', 'ServiceController@store')->name('service.store');

        Route::get('/add-cate', 'ServiceController@createCate')->name('service.createCate');
        Route::post('/add-cate', 'ServiceController@storeCate')->name('service.storeCate');

        Route::get('/edit/{id}', 'ServiceController@edit')->name('service.edit');
        Route::post('/edit/{id}', 'ServiceController@update')->name('service.update');

        Route::get('/destroy/{id}', 'ServiceController@destroy')->name('service.destroy');
        Route::get('/destroy-cate/{id}', 'ServiceController@destroyCate')->name('service.destroyCate');

        Route::get('/show/{id}', 'ServiceController@show')->name('service.show');

        Route::get('/detail/{id}', 'ServiceController@detail')->name('service.detail');
        Route::get('/setactive/{id}/{status}', 'ServiceController@setactive')->name('service.setactive');
        Route::get('/setactive-cate/{id}/{status}', 'ServiceController@setactiveCate')->name('service.setactiveCate');


    });
});



    

   


    


