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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('roles', 'Admin\RoleController');
Route::resource('users', 'Admin\UserController');
Route::post('users-activity', 'Admin\UserController@activityHandler');
Route::resource('modules', 'Admin\ModuleController');
Route::resource('links', 'Admin\LinkController');
Route::resource('permissions', 'Admin\PermissionController');
