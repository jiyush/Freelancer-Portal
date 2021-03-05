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

Route::group(['prefix' => 'home', 'middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index')->name('home');


    // User Routes
    Route::group(['prefix'=>'user','middleware' => 'admin'], function(){

        Route::get('/add','UserController@addUser')->name('user.add');
        Route::post('/save','UserController@saveUser')->name('user.save');
        Route::get('/edit/{id}','UserController@editUser')->name('user.edit');
        Route::post('/update', 'UserController@updateUser')->name('user.update');
        Route::post('/delete', 'UserController@delete')->name('user.delete');
    });

    // Category Routes
    Route::group(['prefix'=> 'category','middleware' => 'admin'],function () {

        Route::get('/', 'CategoryController@index')->name('category');
        Route::get('/add', 'CategoryController@addCategory')->name('category.add');
        Route::post('/save', 'CategoryController@saveCategory')->name('category.save');
        Route::get('/edit/{id}', 'CategoryController@editCategory')->name('category.edit');
        Route::post('/update', 'CategoryController@updateCategory')->name('category.update');
        Route::post('/delete', 'CategoryController@delete')->name('category.delete');
    });

    // Job routes
    Route::group(['prefix'=> 'job'], function(){

        Route::get('/', 'JobController@index')->name('job');
        Route::get('/add', 'JobController@addJob')->name('job.add');
        Route::post('/save', 'JobController@saveJob')->name('job.save');
        Route::get('/edit/{id}', 'JobController@editJob')->name('job.edit');
        Route::post('/update', 'JobController@updateJob')->name('job.update');
        Route::post('/delete', 'JobController@delete')->name('job.delete');
        Route::get('/bid', 'JobController@getBids')->name('job.bid');
        Route::post('/accept', 'JobController@accept')->name('job.accept');
        Route::post('/cancle', 'JobController@cancle')->name('job.cancle');
    });

    // Freelance route
    Route::get('/search', 'FreelancerController@index')->name('freelancer');
    Route::post('/freelancer/bid', 'FreelancerController@bid')->name('freelancer.bid');
    Route::get('/freelancer/job', 'FreelancerController@myJobs')->name('freelancer.job');

});

Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
