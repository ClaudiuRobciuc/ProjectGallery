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

/*Route::get('/', function () {
    return view('welcome');
});*/
Auth::routes();

Route::get('/', [
    'as' => 'frontpage.index',
    'uses' => 'PagesController@index',
]);

Route::get('/shoppingcart', [
    'as' => 'frontpage.shop.index',
    'uses' => 'PagesController@shop',
]);

Route::get('/om-os', [
    'as' => 'frontpage.about',
    'uses' => 'PagesController@about',
]);

Route::get('/services', [
    'as' => 'frontpage.services',
    'uses' => 'PagesController@services',
]);

Route::get('/contact', [
    'as' => 'frontpage.contact',
    'uses' => 'PagesController@contact',
]);

Route::get('/user', [
    'as' => 'frontpage.user.edit',
    'uses' => 'UserController@edit',
]);

Route::post('/user/{id}', [
    'as' => 'frontpage.user.update',
    'uses' => 'UserController@update',
    'middleware' => ['auth'],
]);

Route::post('/addtocart/{id}', [
    'as' => 'frontpage.product.add',
    'uses' => 'PaintingController@add',
    'middleware' => ['auth'],
]);

Route::post('/pay', [
    'as' => 'frontpage.product.pay',
    'uses' => 'PaintingController@pay',
    'middleware' => ['auth'],
]);

Route::prefix('dashboard')->group(function () {

    Route::get('/login',[
        'as' => 'admin.login',
        'uses' => 'Admin\LoginController@index',
    ]);
    
    Route::post('/login',[
        'as' => 'admin.handlelogin',
        'uses' => 'Admin\LoginController@handlelogin',
    ]);
    
    Route::post('/logout',[
        'as' => 'admin.logout',
        'uses' => 'Admin\LoginController@logout',
    ]);
    
    Route::get('/', [
        'as' => 'admin.index',
        'uses' => 'Admin\DashboardController@index',
    ]);

    Route::resource('/users', 'Admin\UserController', ['except' => ['show', 'store'], 'names' => ['index' => 'admin.user.index', 'create' => 'admin.user.create', 'edit' => 'admin.user.edit', 'update' => 'admin.user.update', 'destroy' => 'admin.user.destroy']]);

    Route::resource('/paintings', 'Admin\PaintingController', ['except' => ['show', 'store'], 'names' => ['index' => 'admin.painting.index', 'create' => 'admin.painting.create', 'edit' => 'admin.painting.edit', 'update' => 'admin.painting.update', 'destroy' => 'admin.painting.destroy']]);

    Route::post('/paintings/store', [
        'as' => 'admin.painting.save',
        'uses' => 'Admin\PaintingController@store',
        'middleware' => ['admin'],
    ]);

    Route::resource('/orders', 'Admin\OrdersController', ['except' => ['store', 'create', 'update'], 'names' => ['index' => 'admin.order.index', 'edit' => 'admin.order.edit', 'destroy' => 'admin.order.destroy']]);

    Route::post('/orders/update', [
        'as' => 'admin.order.update',
        'uses' => 'Admin\OrdersController@update',
        'middleware' => ['admin'],
    ]);

});

