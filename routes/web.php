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



  Route::group(['middleware' => ['role:admin']], function () {
    Route::prefix('admin')->group(function () {
      Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
      Route::resource('users', 'Admin\UsersController');
      Route::resource('jobs', 'Admin\JobsController');
      Route::resource('shifts', 'Admin\ShiftsController');
      Route::resource('nurse-categories', 'Admin\NurseCategoriesController');
      Route::resource('teritory-pages', 'Admin\TeritoryPagesController');
      // Route::resource('nurse-categories', 'Admin\NurseCategoriesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
      Route::resource('reports', 'Admin\ReportsController');


      Route::get('users-data', 'Admin\UsersController@getListData')->name('admin.users-data');
      Route::get('nurse-categories-data', 'Admin\NurseCategoriesController@getListData')->name('admin.nurse-categories-data');
      Route::get('shifts-data', 'Admin\ShiftsController@getListData')->name('admin.shifts-data');
      Route::get('jobs-data', 'Admin\JobsController@getListData')->name('admin.jobs-data');
      Route::get('teritory-pages-data', 'Admin\TeritoryPagesController@getListData')->name('admin.teritory-pages-data');

    });
  });

  Route::resource('profile', 'Site\ProfileController', ['only' => ['index', 'update']])->middleware('auth');
  Route::get('profile-edit', 'Site\ProfileController@edit')->name('profile.edit')->middleware('auth');
  Route::post('profile-picture', 'Site\ProfileController@picture')->name('profile.picture')->middleware('auth');
  Route::get('profile-change-password', 'Site\ProfileController@change_password')->name('profile.change-password')->middleware('auth');
  Route::post('profile-change-password-store', 'Site\ProfileController@change_password_store')->name('profile.change-password-store')->middleware('auth');


  Route::resource('requirment', 'Site\RequirmentController', ['only' => ['index', 'create' ,'store']])->middleware('auth');
  Route::resource('shift-list', 'Site\ShiftController', ['only' => ['index']])->middleware('auth');
  Route::post('shift-accept', 'Site\ShiftController@accept')->name('shift.accept')->middleware('auth');
  Route::get('shift-dropout', 'Site\ShiftController@dropout')->name('shift.dropout')->middleware('auth');
  Route::post('shift-dropout-accept', 'Site\ShiftController@acceptDropout')->name('shift.dropout-accept')->middleware('auth');
  Route::get('my-calender', 'Site\CalenderController@index')->name('calender.my-calender')->middleware('auth');

  Route::get('test-sms', 'Site\SendSmsController@index')->name('test.sms')->middleware('auth');

  // Route::get('admin', function () {
  //     return view('admin_template');
  // })->name('admin');

});

// Route::resource('peoples', 'PeoplesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
// Route::resource('nurse_categories', 'NurseCategoriesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
