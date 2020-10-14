<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

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
    return redirect()->route('home.index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/restaurant', function () {
    return view('restaurant');
});


Auth::routes();

Route::resource('/home', 'HomeController');
Route::resource('/carousel', 'CarouselController', ['except' => 'edit', 'create', 'show']);

/**
 * Make the routes needed to the admin to access to the specific view to modify it's users
 * Giving routes to create,store,edit,update and delete users.
 */
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('/users', 'UsersController', ['except' => 'show', 'create', 'store']);
});
Route::get('/myAccountManage','Admin\UsersController@accountManagementView')->name('users.accountManagementView');
Route::post('/myAccount','Admin\UsersController@accountManagement')->name('users.accountManagement');
Route::get('/myAccountinfo','Admin\UsersController@accountInformation')->name('users.accountInformation');





Route::prefix('order')->group(function () {
    Route::resource('/order', 'OrderController', ['except' => 'update']);
});
Route::get('/shop', 'OrderController@indexSalableProducts')->name('order.indexSalableProducts');

/**
 * Make the routes needed to the admin to access to the specific view to modify it's products.
 * Giving routes to create,store,edit,update and delete products.
 */
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('/products', 'ProductsController');
    Route::resource('/news', 'NewsController');
});

Auth::routes(['verify' => true]);




/*Checkout & Panier Routes*/
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::get('/search', 'OrderController@search')->name('products.search');

Route::get('/merci', 'CheckoutController@thankyou')->name('checkout.thankyou');

Route::patch('/panier/{rowId}', 'OrderController@update')->name('order.update');

Route::get('/videpanier', function () {
    Cart::destroy();
});


Route::post('/productsByCategory', 'OrderController@productsByCategory')->name('order.productsByCategory');

/*Contact*/
Route::post('/contact', 'ContactController@store')->name('contact.store');

Route::get('/test',function(){
    return view('accounttest');
});