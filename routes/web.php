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

use App\Http\Controllers\admin\registereduserscontroller;

Route::get('/', function () {
return view('welcome');
                   
});

Auth::routes();

Route::group(['middleware' => ['auth','isUser']],function()
{
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/userwebsite', 'admin\ProductsController@website');
    
    //searching and sorting products
    Route::get('/search-products','admin\ProductsController@search');
    Route::get('/sort-products','admin\ProductsController@display');
     
    //user-edit
    Route::get('/user-edit', 'UserController@index');
    Route::put('/user-edit/{id}', 'UserController@edit');

    
    //cart-operations
    Route::post('/add-cart/{id}', 'cartController@store');
    //Route::get('/show-cart', 'cartController@show');
    Route::get('/cart', 'cartController@show');
    Route::delete('/cart-item/{id}', 'cartController@delete');

    //get product info
    Route::get('product-info/{id}', 'admin\ProductsController@info');
    
    
    //order-operations
    Route::get('/order', 'OrderController@index');  
    //Route::delete('/delete-order-item/{id}', 'OrderController@delete');
    Route::post('/place-order', 'OrderController@store');
    Route::get('/order-history/{id}', 'OrderController@orderHistory');
    Route::get('/order-history', 'OrderController@index');

});                
      
Route::group(['middleware' => ['auth','isAdmin']],function()
{
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    });
    
    Route::get('/registeredusers','admin\RegisteredusersController@index');
    Route::delete('/action-user/{id}', 'admin\RegisteredusersController@delete');

    //adding Products
    Route::get('/addproducts','admin\ProductsController@index');
    Route::post('/store-product','admin\ProductsController@store');
    Route::get('/allproducts','admin\ProductsController@show');
    Route::delete('/action-product/{id}', 'admin\ProductsController@delete');
    
});
