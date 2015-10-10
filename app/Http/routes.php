<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

/* Route model binding */
$router->bind('tasks', function($task_id) {
	return App\Task::whereId($task_id)->first();
});

/* Redirect to authentication */
Route::get('/', function() {
	return redirect('/auth/login');
});

/* Tasks routes */
Route::group(['prefix' => 'tasks', 'as' => 'tasks.'], function() {
    Route::patch('complete/{tasks}',
        ['as' => 'complete', 'uses' => 'TasksController@complete']);
    Route::post('delete_done',
        ['as' => 'destroyDone', 'uses' => 'TasksController@destroyDone']);
});
Route::resource('tasks', 'TasksController', ['except' => ['create']]);

/* Options routes */
Route::group(['prefix' => 'options', 'as' => 'options.'], function() {
	Route::get('/', ['as' => 'index', 'uses' => 'OptionsController@index']);
    Route::get('email', 
        ['as' => 'editEmail', 'uses' => 'OptionsController@editEmail']);
    Route::post('email', 
        ['as' => 'updateEmail', 'uses' => 'OptionsController@updateEmail']);
    Route::post('notification', 
        ['as' => 'toggleNotify', 'uses' => 'OptionsController@toggleNotify']);
    Route::get('password', 
        ['as' => 'editPassword', 'uses' => 'OptionsController@editPassword']);
    Route::post('password', 
        ['as' => 'updatePassword', 'uses' => 'OptionsController@updatePassword']);
    Route::get('delete', 
        ['as' => 'confirmDelete', 'uses' => 'OptionsController@confirmDelete']);
    Route::post('delete', 
        ['as' => 'delete', 'uses' => 'OptionsController@deleteAccount']);
});

/* Authentication routes */
Route::get('auth/login', 
    ['as' => 'auth.showLogin', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 
    ['as' => 'auth.login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', 
    ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);
Route::get('auth/register', 
    ['as' => 'auth.showRegister', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', 
    ['as' => 'auth.register', 'uses' => 'Auth\AuthController@postRegister']);
