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

/*
 * Frontend
 */
Route::get('/', function () { return view('welcome'); });

/*
 * Backend
 */

// Authentication Routes...
Route::get('/securepanel', function () { return redirect('/securepanel/login'); });
$this->get('securepanel/login', 'Backend\LoginController@showLoginForm')->name('securepanel.auth.login');
$this->post('securepanel/login', 'Backend\LoginController@login')->name('securepanel.auth.login');
$this->post('securepanel/logout', 'Backend\LoginController@logout')->name('securepanel.auth.logout');
Auth::routes();

// Change Password Routes...
$this->get('securepanel/change_password', 'Backend\ChangePasswordController@showChangePasswordForm')->name('securepanel.auth.change_password');
$this->patch('securepanel/change_password', 'Backend\ChangePasswordController@changePassword')->name('securepanel.auth.change_password');

// Password Reset Routes...
$this->get('securepanel/password/reset', 'Backend\ForgotPasswordController@showLinkRequestForm')->name('securepanel.auth.password.email');
$this->post('securepanel/password/email', 'Backend\ForgotPasswordController@sendResetLinkEmail')->name('securepanel.auth.password.reset');
$this->get('securepanel/password/reset/{token}', 'Backend\ResetPasswordController@showResetForm')->name('securepanel.auth.password.reset');
$this->post('securepanel/password/reset', 'Backend\ResetPasswordController@reset')->name('securepanel.auth.password.reset');

