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
    Route::get('/user/add','UserController@addUser')->name('user.add');
    Route::post('/user/save','UserController@saveUser')->name('user.save');
    Route::get('/user/edit/{id}','UserController@editUser')->name('user.edit');
    Route::post('/user/update', 'UserController@updateUser')->name('user.update');
    Route::post('/user/delete', 'UserController@delete')->name('user.delete');

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
    Route::get('/job', 'JobController@index')->name('job');
    Route::get('/job/add', 'JobController@addJob')->name('job.add');
    Route::post('/job/save', 'JobController@saveJob')->name('job.save');
    Route::get('/job/edit/{id}', 'JobController@editJob')->name('job.edit');
    Route::post('/job/update', 'JobController@updateJob')->name('job.update');
    Route::post('/job/delete', 'JobController@delete')->name('job.delete');
    Route::get('/job/bid', 'JobController@getBids')->name('job.bid');
    Route::post('/job/accept', 'JobController@accept')->name('job.accept');
    Route::post('/job/cancle', 'JobController@cancle')->name('job.cancle');

    // Freelance route
    Route::get('/search', 'FreelancerController@index')->name('freelancer');
    Route::post('/freelancer/bid', 'FreelancerController@bid')->name('freelancer.bid');
    Route::get('/freelancer/job', 'FreelancerController@myJobs')->name('freelancer.job');

});

Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
