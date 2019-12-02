<?php
// Admin
Route::group(['namespace'=>'Admin'],function (){
    Route::group(['prefix'=>'login'],function (){
        Route::get('/','LoginController@getLogin');
        Route::post('check','LoginController@postLogin');
    });
    Route::get('logout','HomeController@getLogout');
    Route::group(['prefix'=>'admin','middleware' => ['CheckLogedIn']],function () {
        Route::get('/home','HomeController@index');
        Route::resource('brand','BrandController');
        Route::resource('category','CategoryController');
        Route::resource('customer','CustomerController');
        Route::resource('product','ProductController');
        Route::resource('order','OrderController');
    });
});
// Client
Route::get('/home','HomeController@Index');
Route::get('/category/{id}','HomeController@Category');
Route::get('/brand/{id}','HomeController@Brand');
Route::get('product/show/{id}','HomeController@ShowProduct');
// Đăng nhập Đăng xuất client
Route::get('dang-nhap','LoginController@getLogin');
Route::post('check','LoginController@postLogin');
Route::get('dang-xuat','LoginController@getLogout');
//Đăng ký
Route::resource('user','UserController');
//Giỏ hàng
Route::group(['prefix'=>'cart','middleware' => ['CheckLogedInClient']],function (){
    Route::get('add/{id}','CartController@getAddCart');
    Route::get('show','CartController@getShowCart');
    Route::get('delete/{id}','CartController@getDeleteCart');
    Route::get('update','CartController@getUpdateCart');
    Route::get('thanhToanCart','CartController@thanhToanCart');
});
//Cập nhật Khách hàng
Route::group(['prefix'=>'customerInfo','middleware' => ['CheckLogedInClient']],function (){
    Route::resource('customerInfo','CustomerInfoController');
});
