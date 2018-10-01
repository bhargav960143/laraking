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

//$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');

Route::get('/securepanel', function () { return redirect('/securepanel/login'); });
$this->get('securepanel/login', 'Auth\LoginController@showLoginForm')->name('securepanel.auth.login');
$this->post('securepanel/login', 'Auth\LoginController@login')->name('securepanel.auth.login');
$this->post('securepanel/logout', 'Auth\LoginController@logout')->name('securepanel.auth.logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
