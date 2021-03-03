<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/user/add','UserController@addUser')->name('user.add');
Route::post('/home/user/save','UserController@saveUser')->name('user.save');
Route::get('/home/user/edit/{id}','UserController@editUser')->name('user.edit');
Route::post('/home/user/update', 'UserController@updateUser')->name('user.update');
Route::post('/home/user/delete', 'UserController@delete')->name('user.delete');

Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
