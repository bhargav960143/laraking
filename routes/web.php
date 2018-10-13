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
$this->get('securepanel/change_password', 'Backend\ChangePasswordController@showChangePasswordForm')->name('securepanel.auth.change_password');
$this->patch('securepanel/change_password', 'Backend\ChangePasswordController@changePassword')->name('securepanel.auth.change_password');
$this->get('securepanel/password/reset', 'Backend\ForgotPasswordController@showLinkRequestForm')->name('securepanel.auth.password.email');
$this->post('securepanel/password/email', 'Backend\ForgotPasswordController@sendResetLinkEmail')->name('securepanel.auth.password.reset');
$this->get('securepanel/password/reset/{token}', 'Backend\ResetPasswordController@showResetForm')->name('securepanel.auth.password.reset');
$this->post('securepanel/password/reset', 'Backend\ResetPasswordController@reset')->name('securepanel.auth.password.reset');
Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix' => 'securepanel', 'as' => 'securepanel.'], function () {
    Route::get('dashboard', 'Backend\DashboardController@index');

    Route::resource('roles', 'Backend\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Backend\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);

    Route::get('tracker', 'Backend\TrackerController@index');
    Route::get('tracker/visits', 'Backend\TrackerController@visits');
    Route::get('tracker/summary', 'Backend\TrackerController@summary');
    Route::get('tracker/users', 'Backend\TrackerController@users');
    Route::get('tracker/errors', 'Backend\TrackerController@errors');



    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::post('users/get_table','Admin\UsersController@get_table');
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
});

