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
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/executive/login', 'Auth\ExecutiveLoginController@showLoginForm')->name('executive.login');
Route::post('/executive/login', 'Auth\ExecutiveLoginController@login')->name('executive.login.submit');
Route::get('/executive/logout', 'Auth\ExecutiveLoginController@logout')->name('executive.logout');
Route::get('/executive', 'ExecutiveController@index')->name('executive.dashboard');
//function to group all the admin prefix
Route::prefix('admin')->group(function()
{
Route::get('/login', 'Auth\AdminLoginController@showLoginForms')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/', 'AdminController@index')->name('admin.dashboard');
Route::get('/user/create', 'UserController@index')->name('admin.create');
Route::get('/user/view', 'UserController@show')->name('admin.view');
Route::post('/user/view', 'UserController@store')->name('admin.view');
Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


});
