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
    return view('authentication.user_login');
});

Route::get('/Login', function () {
    return view('authentication.user_login');
});
Route::post('UserLogin','UserInfoController@userLogin');
Route::get('Logout','UserInfoController@usersLogOut');
Route::get('Home','UserInfoController@userHome');

Route::post('UserPasswordCheck','UserInfoController@userPasswordCheck');
Route::get('PasswordCheck', function () {
    return view('authentication.password_check');
});

Route::post('UserPasswordCheck','UserInfoController@userPasswordCheck');


Route::resource('UserTypeInfo','UserTypeController');
Route::get('/get/all/UserType','UserTypeController@getAllUserType')->name('all.UserType');

Route::resource('UserInfo','UserInfoController');
Route::get('/get/all/UserInfo','UserInfoController@getAllUserInfo')->name('all.UserInfo');

Route::resource('ProductType','ProductTypeController');
Route::get('/get/all/ProductType','ProductTypeController@getAllProductType')->name('all.ProductType');


Route::resource('CategoriesInfo','CategoryInfoController');
Route::get('/get/all/Categories','CategoryInfoController@getAllcategories')->name('all.Categories');

Route::resource('CustomerInfo','CustomerController');
Route::get('/get/all/Customer','CustomerController@getAllCustomer')->name('all.Customer');

Route::resource('ProductInfo','ProductInfoController');
Route::get('/get/all/ProductInfo','ProductInfoController@getAllProductInfo')->name('all.ProductInfo');
Route::get('AddProduct','ProductInfoController@indexs');
Route::get('getProductType','ProductInfoController@showProductType');
Route::get('getCategories','ProductInfoController@showCategoris');

Route::resource('ProductStock','ProductStockController');
Route::post("saveStockMasterData","ProductStockController@addStockMST");
Route::post("addmore","ProductStockController@addMorePost");
Route::get('showProductList','ProductStockController@showProductList');
Route::get('showCompanyList','ProductStockController@showCompanyList');
Route::get('ProductStockBulk','ProductStockController@indexs');
Route::get('ProductStockInfo','ProductStockController@indexView');
Route::get('/get/all/ProductStock','ProductStockController@getAllStockInfo')->name('all.ProductStock');


Route::resource('RegulerSell','RegulerSellController');
Route::post('/autocomplete/fetch', 'RegulerSellController@fetch')->name('autocomplete.fetch');
Route::post('ShowProductByBarCode','RegulerSellController@showProductByBarCode');
Route::post("PlaceOrder","RegulerSellController@saveOrderData");
Route::get('/get/all/ProductList','RegulerSellController@getAllProductInfoForSell')->name('all.ProductList');
Route::get('/get/all/LastSellInfo','RegulerSellController@getLastSellInfo')->name('all.LastSellInfo');
Route::get('CashMemo/{invoiceNo}','RegulerSellController@indexs');
