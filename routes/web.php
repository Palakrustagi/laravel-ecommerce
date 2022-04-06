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



Route::group(['middleware' => ['auth','isUser']],function(){
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search-products','admin\productscontroller@searchproducts');
//Route::get('/useredit', 'registereduserscontroller@edit');
Route::get('/display-products','admin\productscontroller@display');

 

Route::get('/order', 'OrderController@index');
Route::get('/cart', 'cartController@index');
Route::post('/product-info/{id}', 'admin\productscontroller@info');
Route::post('/add-cart', 'cartController@store');
Route::get('/show-cart', 'cartController@show');
Route::delete('/delete-cart-item/{id}', 'cartController@delete');
Route::delete('/delete-order-item/{id}', 'OrderController@delete');
Route::get('/userwebsite', 'admin\productscontroller@website');
Route::post('/proceed-buy/{id}', 'OrderController@store');

});



Route::group(['middleware' => ['auth','isAdmin']],function()
{
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    });
    
    Route::get('/registeredusers','admin\registereduserscontroller@index');
    Route::delete('/role-delete/{id}', 'admin\registereduserscontroller@delete');
    Route::get('/addproducts','admin\productscontroller@index');
    Route::post('/store-product','admin\productscontroller@store');
    Route::get('/allproducts','admin\productscontroller@show');
    
    Route::delete('/delete-product/{id}', 'admin\productscontroller@delete');
    //Route::get('/display-products','admin\productscontroller@display');
    
    
   
});
