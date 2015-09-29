<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$router->bind('tasks', function($task_id)
{
	return App\Task::whereId($task_id)->first();
});

// Redirect from '/' to '/auth/login'
Route::get('/', function() {
	return redirect('/auth/login');
});

// Task resource
// only available to authenticated users
Route::group(['middleware' => 'auth'], function() {
	Route::resource('tasks', 'TasksController');
	Route::patch('tasks/complete/{tasks}', ['as' => 'tasks.complete', 'uses' => 'TasksController@complete']);

	// Options routes
	Route::get('options', ['as' => 'options.index', 'uses' => 'OptionsController@index']);

	Route::get('options/email', ['as' => 'options.editEmail', 'uses' => 'OptionsController@editEmail']);
	Route::post('options/email', ['as' => 'options.updateEmail', 'uses' => 'OptionsController@updateEmail']);

	Route::post('options/notification', ['as' => 'options.toggleNotify', 'uses' => 'OptionsController@toggleNotify']);

	Route::get('options/password', ['as' => 'options.editPassword', 'uses' => 'OptionsController@editPassword']);
	Route::post('options/password', ['as' => 'options.updatePassword', 'uses' => 'OptionsController@updatePassword']);

	Route::get('options/delete', ['as' => 'options.confirmDelete', 'uses' => 'OptionsController@confirmDelete']);
	Route::post('options/delete', ['as' => 'options.delete', 'uses' => 'OptionsController@deleteAccount']);
});

// Authentication routes
Route::get('auth/login', ['as' => 'auth.showLogin', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes
Route::get('auth/register', ['as' => 'auth.showRegister', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@postRegister']);
