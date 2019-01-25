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
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('users.logout');
Route::get('/executive/login', 'Auth\ExecutiveLoginController@showLoginForm')->name('executive.login');
Route::get('users/dept/view', 'DepartmentController@show');
Route::get('users/tasks/view', 'UserTaskController@userTask')->name('users.tasks.view');
Route::post('/executive/login', 'Auth\ExecutiveLoginController@login')->name('executive.login.submit');
Route::get('/executive/logout', 'Auth\ExecutiveLoginController@logout')->name('executive.logout');
Route::get('/executive', 'ExecutiveController@index');
Route::get('users/tasks/reply/{id}','ReplyController@showReplyForm');
Route::post('users/tasks/replied/{taskid}/{userid}','ReplyController@replyTask');
//function to group all the admin prefix
Route::prefix('admin')->group(function()
{
Route::get('/login', 'Auth\AdminLoginController@showLoginForms')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/', 'AdminController@index')->name('admin.dashboard');
Route::get('/user/create', 'UserController@index')->name('admin.create');
Route::get('/user/view', 'UserController@show')->name('admin.view');
Route::post('/user/view', 'UserController@store')->name('admin.view');
Route::get('/user/edit/{id}', 'UserController@edit')->name('admin.view');
Route::put('/user/update/{id}', 'UserController@update');
Route::get('/dept/show', 'DepartmentController@show')->name('admin.dept.show');
Route::get('/dept/create', 'DepartmentController@index')->name('admin.dept.create');
Route::post('/dept/create', 'DepartmentController@store');
Route::delete('/dept/view/{id}', 'DepartmentController@destroy')->name('admin.view.delete');
Route::get('/dept/edit/{id}', 'DepartmentController@edit');
Route::put('/dept/update/{id}', 'DepartmentController@update');
Route::get('/user/role', 'RoleController@index')->name('admin.view');
Route::put('/user/role/update/{id}', 'RoleController@update')->name('admin.view');
Route::get('/user/role/edit/{id}', 'RoleController@edit')->name('admin.view');
Route::post('/user/role/create', 'RoleController@store')->name('admin.view');
Route::delete('/user/role/{id}', 'RoleController@destroy');
Route::delete('/user/view/{id}', 'UserController@destroy')->name('admin.view.delete');
Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::get('/setting/email', 'MailController@index');
Route::get('/setting/email/submit', 'MailController@mail');
Route::post('/setting/email/create', 'MailController@emailform');
Route::get('/setting/sms', 'SmsController@index');
Route::post('/setting/sms/create', 'SmsController@smsform');
Route::get('/tasks/assign', 'TaskController@index');
Route::get('/tasks/view', 'TaskController@show');
Route::post('/tasks/assign/assigned', 'TaskController@storeTask');
Route::get('/tasks/edit/{id}', 'TaskController@edit');
Route::put('/tasks/update/{id}', 'TaskController@update');
Route::delete('/tasks/view/{id}', 'TaskController@destroy');
Route::get('/customers/show', 'TaskController@customers');





});
