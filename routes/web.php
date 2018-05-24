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
Auth::routes();

Route::group(['middleware' => 'auth'], function () {

  Route::get('/', function () {
      return view('welcome');
  });

  Route::get('/home', 'HomeController@index')->name('home');




  Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::resource('users', 'Admin\UsersController');
    Route::resource('jobs', 'Admin\JobController');
    Route::resource('shifts', 'Admin\ShiftController');
    Route::resource('nurse-categories', 'Admin\NurseCategoriesController');
    // Route::resource('nurse-categories', 'Admin\NurseCategoriesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
    Route::resource('reports', 'Admin\ReportsController');


    Route::get('users-data', 'Admin\UsersController@getListData')->name('admin.users-data');
    Route::get('nurse-categories-data', 'Admin\NurseCategoriesController@getListData')->name('admin.nurse-categories-data');

  });


  Route::get('admin', function () {
      return view('admin_template');
  })->name('admin');

});

Route::resource('peoples', 'PeoplesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
// Route::resource('nurse_categories', 'NurseCategoriesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
