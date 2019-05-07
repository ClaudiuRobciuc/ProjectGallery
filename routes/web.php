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



