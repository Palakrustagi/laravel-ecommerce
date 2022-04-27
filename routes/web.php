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

    Route::get('/userwebsite', 'admin\productscontroller@website');
    
    //searching and sorting products
    Route::get('/search-products','admin\productscontroller@search');
    Route::get('/sort-products','admin\productscontroller@display');
     
    //user-edit
    Route::get('/user-edit', 'UserController@index');
    Route::post('/edit-profile/{id}', 'UserController@edit');

    
    //cart-operations
    Route::post('/add-cart', 'cartController@store');
    Route::get('/show-cart', 'cartController@show');
    Route::get('/cart', 'cartController@index');
    Route::delete('/delete-cart-item/{id}', 'cartController@delete');

    
    Route::post('product-info/{id}', 'admin\productscontroller@info');
    
    
    //order-operations
    Route::get('/order', 'OrderController@index');
    Route::delete('/delete-order-item/{id}', 'OrderController@delete');
    Route::post('/place-order/{id}', 'OrderController@store');
    Route::get('/order-history/{id}', 'OrderController@orderHistory');
    Route::get('/order-history', 'OrderController@index');


});



Route::group(['middleware' => ['auth','isAdmin']],function()
{
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    });
    
    Route::get('/registeredusers','admin\registereduserscontroller@index');
    Route::delete('/role-delete/{id}', 'admin\registereduserscontroller@delete');

    //adding Products
    Route::get('/addproducts','admin\productscontroller@index');
    Route::post('/store-product','admin\productscontroller@store');
    Route::get('/allproducts','admin\productscontroller@show');
    Route::delete('/delete-product/{id}', 'admin\productscontroller@delete');
    
   
    
   
});
