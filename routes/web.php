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

Route::get('/', function() {
    return view('welcome-partial');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group( ['prefix' => 'auth', 'namespace' => 'Auth'], function() {

    Route::get( 'auth/login', 'LoginController@show' )->name( 'auth.login' );

} );

Route::get( 'tasks', function() {
    return view( '/users/user-tasks' );
} );

Route::resource( 'tasks', 'TaskController' );
