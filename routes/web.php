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

Route::get('/', 'EntityController@home')->name('guest.entity.home');
Route::get('search', 'EntityController@search')->name('guest.entity.search');
Route::get('comparison', 'ComparisonController@index')->name('guest.comparison.index'); // cek isi list comparison

Route::get('doctor/{doctor}', 'DoctorController@show')->name('doctor.show');
Route::post('comparison', 'DoctorController@comparison')->name('doctor.compare'); // menambah doctor ke list comparison
Route::get('hospital/{hospital}', 'HospitalController@show')->name('hospital.show');
Route::get('country/{country}', 'CountryController@show')->name('country.show');
Route::get('city/{city}', 'CityController@show')->name('city.show');

Route::delete('comparison/{id}', 'DoctorController@remove')->name('doctor.remove'); // hapus cookie

Route::prefix('webapp')->group(function () {
    Auth::routes();
});

Route::get('users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    //Password Reset Routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

Route::get('/dashboard', 'HomeController@index')->name('home');
