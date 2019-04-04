<?php
use App\Events\FormSubmitted;
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

//task details to be converted to project on the modal
Route::get('users/task/convert','ProjectConversion@showtask')->name('users.task.convert');
//post project
Route::post('users/project/create','ProjectConversion@postProject')->name('users.project.create');
//requests
Route::get('users/request/show','Requisition@showForm')->name('users.request.show');
Route::post('users/request/send','Requisition@sendRequest')->name('users.request.send');
//quotation
Route::get('users/quotations/view','userTaskController@quotations')->name('users.quotations.view');
Route::get('users/quotation/view/{id}','userTaskController@showQuotation')->name('users.quotation.show');
//upload quotation or invoice
Route::post('users/file/upload/{name}/{email}/{topic}/{id}', 'userTaskController@fileUploadPost')->name('users.file.upload');
//activities
Route::get('users/activities/view','activityController@index')->name('users.activities.view');
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
//settings
Route::get('/setting/email', 'MailController@index');
Route::get('/setting/email/submit', 'MailController@mail');
Route::post('/setting/email/create', 'MailController@emailform');
Route::get('/setting/sms', 'SmsController@index');
Route::post('/setting/sms/create', 'SmsController@smsform');
//assigned tasks
Route::get('/tasks/assign', 'TaskController@index');
Route::POST('/task/assign/{id}', 'TaskController@populateCustomers');
Route::get('/tasks/view', 'TaskController@show');
Route::post('/tasks/assign/assigned', 'TaskController@storeTask');
Route::get('/tasks/edit/{id}', 'TaskController@edit');
Route::put('/tasks/update/{id}', 'TaskController@update');
Route::delete('/tasks/view/{id}', 'TaskController@destroy');

//showing admin reply form
Route::get('/tasks/comment/{taskasigned}','CommentController@show')->name('admin.tasks.comment');
Route::post('/tasks/comment/{taskid}/{userid}', 'CommentController@CommentTask');
//expenditure
Route::post('/spending/create','SpendingsController@store');
Route::get('/spendings/create','SpendingsController@create')->name('admin.spendings.create');
Route::get('/spend/create','SpendingsController@ReadData')->name('admin.spend.create');
Route::get('/spendings/view','SpendingsController@index')->name('admin.spendings.view');
Route::get('/spending/view','SpendingsController@search')->name('admin.spending.view');
Route::delete('/spending/delete/{id}', 'SpendingsController@destroy');
//expense accounts
Route::get('/account/create','AccountsController@create')->name('admin.account.create');
Route::post('/account/created','AccountsController@store');
Route::get('/account/show','AccountsController@index')->name('admin.account.show');
Route::get('/topup/view','TopupController@index')->name('admin.topup.view');
Route::post('/topup/make','TopupController@store');
Route::get('/account/topup','TopupController@create')->name('admin.account.topup');
//show projects
Route::get('/projects/view','Projects@showProjects')->name('admin.projects.view');
Route::get('/project/view','Projects@showProject')->name('admin.project.view');
Route::post('/project/delete','Projects@terminateProject')->name('admin.project.delete');
//show requests
Route::get('/requests/view','AdminViewRequest@showRequests')->name('admin.requests.view');
Route::post('/request/approval/{id}', 'AdminViewRequest@Approve');
Route::post('/request/decline/{id}', 'AdminViewRequest@Decline');
//adding new expense person
Route::post('/person/add', 'newpersonController@store')->name('admin.person.add');
Route::get('/newpersons/show', 'SpendingsController@personsgiven');
//downloads
Route::get('/pdf/download', 'SpendingsController@downloadPDF')->name('admin.pdf.download');
//call management
Route::get('/call/details', 'callController@index')->name('admin.call.details');
Route::get('/call/view', 'callController@view')->name('admin.call.view');
//add customer
Route::get('/customers/show', 'CustomerController@customers');
Route::get('/customers/populate', 'CustomerController@newCustomers');
Route::get('/customers/search', 'CustomerController@search');
Route::post('/customer/add', 'CustomerController@add')->name('admin.customer.add');
});
