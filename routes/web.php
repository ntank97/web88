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


Route::get('kho-giao-dien','FrontendController@khoGiaoDien')->name('kho.giao.dien');

Route::get('kho-giao-dien/{slug}-{id}','FrontendController@getListProduct')->name('get.list.product');

Route::get('lien-he','FrontendController@lienHe')->name('lien.he');

Route::get('khach-hang','FrontendController@khachHang')->name('khach.hang');

Route::get('seo','FrontendController@seo')->name('seo');

Route::get('thiet-ke-website','FrontendController@thietKeWebsite')->name('thiet.ke.website');

Route::get('bang-gia-thiet-ke-website', 'FrontendController@bangGiaThietKeWebsite')->name('bang.gia.thiet.ke.website');

Route::get('cham-soc-website', 'FrontendController@chamSocWebsite')->name('cham.soc.website');

Route::get('dich-vu-thiet-ke-website', 'FrontendController@dichVuThietKeWebsite')->name('dich.vu.thiet.ke.website');

Route::get('dich-vu-seo-website', 'FrontendController@dichVuSeoWebsite')->name('dich.vu.seo.website');

Route::get('dich-vu-viet-bai-chuan-seo', 'FrontendController@dichVuVietBaiChuanSeo')->name('dich.vu.viet.bai.chuan.seo');

Route::get('dieu-kien-va-chinh-sach', 'FrontendController@dieuKienVaChinhSach')->name('dieu.kien.va.chinh.sach');

Route::get('domain-gia-re', 'FrontendController@domaiGiaRe')->name('domain.gia.re');

Route::get('gioi-thieu-dich-vu', 'FrontendController@gioiThieuDichVu')->name('gioi.thieu.dich.vu');

Route::get('hinh-thuc-thanh-toan', 'FrontendController@hinhThucThanhToan')->name('hinh.thuc.thanh.toan');

Route::get('hosting-chat-luong-cao', 'FrontendController@hostingChatLuongCao')->name('hosting.chat.luong.cao');

Route::get('ho-tro-khach-hang', 'FrontendController@hoTroKhachHang')->name('ho.tro.khach.hang');

Route::get('quy-trinh-thiet-ke-website', 'FrontendController@quyTrinhThietKeWebsite')->name('quy.trinh.thiet.ke.website');

Route::get('thiet-ke-web-chuan-moblie', 'FrontendController@thietKeWebChuanMobile')->name('thiet.ke.web.chuan.mobile');

Route::get('thiet-ke-web-chuan-seo-chuyen-nghiep', 'FrontendController@thietKeWebChuanSeoChuyenNghiep')->name('thiet.ke.web.chuan.seo.chuyen.nghiep');

Route::get('thiet-ke-website', 'FrontendController@thietKeWebsite')->name('thiet.ke.website');

Route::get('thiet-ke-website-theo-mau', 'FrontendController@thietKeWebsiteTheoMau')->name('thiet.ke.website.theo.mau');

Route::get('thiet-ke-web-tron-goi-gia-re', 'FrontendController@thietKeWebTronGoiGiaRe')->name('thiet.web.tron.goi.gia.re');

Route::get('tin-tuc', 'FrontendController@tinTuc')->name('tin.tuc');

Route::get('tuyen-dung', 'FrontendController@tuyenDung')->name('tuyen.dung');

Route::get('thiet-ke-web-theo-yeu-cau','FrontendController@thietKeWebTheoYeuCau')->name('thiet.ke.web.theo.yeu.cau');

Route::get('dich-vu-thiet-ke-web-gia-re','FrontendController@dichVuThietKeWebGiaRe')->name('dich.vu.thiet.ke.web.gia.re');

Route::post('dang-ky','FrontendController@dangki')->name('khoi.tao.web');

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
            Route::get('index','PendingController@index')->name('pending.index');
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



    

    


