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
use App\Task;

Route::get('/', function() {
    return view('welcome-partial');
});

Auth::routes();

Route::group( ['prefix' => 'auth', 'namespace' => 'Auth'], function() {

    Route::get( 'auth/login', 'LoginController@show' )->name( 'auth.login' );

} );

Route::get( 'users/user-tasks', 'TaskController@myTasks' )->name( 'user.tasks' );

Route::resource( 'tasks', 'TaskController' );
