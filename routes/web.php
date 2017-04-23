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
    return view('welcome');
});

Route::get('/customers', function () {


    return view('welcome');
});


Route::get('/admin', function () {


    return view('admin.index');
});



//Route::group(['middleware'=>'cors','prefix'=>'api'], function (){
//    Route::get('book', 'BookController@index');
//    Route::post('book', 'BookController@createBook');
//});


Route::resource('customer', 'CustomerController');


Auth::routes();

Route::get('/home', 'HomeController@index');


Route::resource('admin/users', 'AdminUsersController');

Route::group(['middleware'=>'cors','prefix'=>'api'], function (){
   Route::get('admin/users', 'AdminUsersController@index');
   Route::post('admin/users', 'AdminUsersController@create');
   
});
