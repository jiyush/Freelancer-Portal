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

// User Routes
Route::get('/home/user/add','UserController@addUser')->name('user.add');
Route::post('/home/user/save','UserController@saveUser')->name('user.save');
Route::get('/home/user/edit/{id}','UserController@editUser')->name('user.edit');
Route::post('/home/user/update', 'UserController@updateUser')->name('user.update');
Route::post('/home/user/delete', 'UserController@delete')->name('user.delete');

// Category Routes
Route::get('/home/category', 'CategoryController@index')->name('category');
Route::get('/home/category/add', 'CategoryController@addCategory')->name('category.add');
Route::post('/home/category/save', 'CategoryController@saveCategory')->name('category.save');
Route::get('/home/category/edit/{id}', 'CategoryController@editCategory')->name('category.edit');
Route::post('/home/category/update', 'CategoryController@updateCategory')->name('category.update');
Route::post('/home/category/delete', 'CategoryController@delete')->name('category.delete');

// Job routes
Route::get('/home/job', 'JobController@index')->name('job');
Route::get('/home/job/add', 'JobController@addJob')->name('job.add');
Route::post('/home/job/save', 'JobController@saveJob')->name('job.save');
Route::get('/home/job/edit/{id}', 'JobController@editJob')->name('job.edit');
Route::post('/home/job/update', 'JobController@updateJob')->name('job.update');
Route::post('/home/job/delete', 'JobController@delete')->name('job.delete');



Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
