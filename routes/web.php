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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['prefix'=>'/page','Middlware'=>'CheckAdmin'],function(){
    
//     Route::get('/','HomeControll@index')->name('admin.view_all');
    
//     Route::get('/dashboard}','HomeController@index' );
    
// });


// Route::group(['prefix' => 'admin'], function() {
//     Route::get('/login', 'LoginController@form')->name('login.form');
//     Route::post('/login','LoginController@access')->name('login.access');

//     Route::get('logout','LogoutController@logout')->name('logout');
// });
