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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/admin_panel', 'HomeController@retrive_users_db')->name('admin_panel')->middleware('admin');
Route::get('/admin_edit/{id}','HomeController@admin_edit')->middleware('admin');
Route::post('/admin_panel/{id}','HomeController@admin_update')->middleware('admin');
// Route::get('/home', 'HomeController@index')->name('home')->middleware('teamlead');
 //Route::get('/home', 'HomeController@index')->name('home');








// Route::get('manager_panel', 'ManagerController@manager_home'); 
Route::get('manager_panel', 'ManagerController@retrive_users_db')->middleware('manager')->name('manager_panel');
Route::get('manager/manager_edit/{id}', 'ManagerController@edit_page')->middleware('manager');

//Route::get('manager/manager_edit', 'ManagerController@edit_page');
Route::post('manager/manager_panel/{id}', 'ManagerController@update')->middleware('manager');

Route::get('manager/assign_task/{id}', 'ManagerController@task_form')->middleware('manager');
Route::post('manager/assign_task/{id}', 'ManagerController@assign_task')->middleware('manager');

Route::get('manager/assigned_task/{id}','TaskController@manager_assigned_task')->middleware('manager')->name('assigned_task');
Route::get('manager/manager_edit_task/{id}', 'TaskController@manager_edit_task')->middleware('manager');
Route::post('manager/assigned_task/{id}', 'TaskController@manager_update_task')->middleware('manager');
Route::get('manager/manager_view_assign_task/{id}', 'TaskController@manager_view_assign_task')->middleware('manager');


Route::get('manager/delete_assigned_task/{id}', 'TaskController@delete_manager_assigned_task')->middleware('manager')->name('delete_assigned_task');





Route::get('teamlead', ['as' => 'teamlead_index', 'middleware' => 'teamlead', 'uses' =>'TeamleadController@retrive_users_db']);
Route::get('teamslead/teamlead_edit/{id}', 'TeamleadController@edit_page')->middleware('teamlead');
Route::post('teamslead/teamlead/{id}', 'TeamleadController@update')->middleware('teamlead');
Route::get('teamslead/assign_task/{id}','TeamleadController@task_form')->middleware('teamlead');
Route::post('teamslead/assign_task/{id}','TeamleadController@assign_task')->middleware('teamlead');
Route::get('teamslead/assigned_task/{id}','TaskController@teamlead_assigned_task')->middleware('teamlead');
Route::get('teamslead/teamlead_edit_task/{id}', 'TaskController@teamlead_edit_task')->middleware('teamlead');
Route::post('teamslead/assigned_task/{id}', 'TaskController@teamlead_update_task')->middleware('teamlead');

//used for seeing temlead tasks
Route::get('teamslead/task_assigned_to_teamlead/{id}', 'TaskController@task_assigned_to_teamlead')->name('task_assigned_to_teamlead')->middleware('teamlead');

Route::get('teamslead/teamlead_view_task/{id}', 'TaskController@teamlead_view_task')->middleware('teamlead');
Route::get('teamslead/teamlead_view_assign_task/{id}', 'TaskController@teamlead_view_task')->middleware('teamlead');

//Use for finishing teamlead task
Route::post('teamslead/teamlead_finish_task/{Taskid}', 'TaskController@teamlead_finish_task')->name('teamlead_finish_task')->middleware('teamlead');
Route::get('manager/delete_assigned_task/{id}', 'TaskController@delete_teamlead_assigned_task')->middleware('manager')->name('teamlead_delete_assigned_task');


Route::get('employee_panel', 'EmployeeController@employee_home')->name('employee_panel')->middleware('employee');
Route::post('employee/employee_finish_task/{Taskid}', 'EmployeeController@employee_finish_task')->name('employee_finish_task')->middleware('employee');
Route::get('employee/view_assigned_task/{id}','EmployeeController@view_assigned_task')->middleware('employee');

Route::get('waiting',  'HomeController@waiting');
Route::get('email/welcome','mailController@send');
Route::get('profile','UserController@profile');
Route::post('profile', 'UserController@update_image')->name('profile');

Route::get('/logout', 'LoginController@getSignOut');


