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
    return view('index');
});
Route::group(['prefix' => 'admin'],function(){
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