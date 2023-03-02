<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Auth'], function () {
    // Login
    Route::get('login', 'LoginController@showLoginForm')->name('showLoginForm');
    Route::post('login', 'LoginController@login')->name('login');
    Route::get('register', 'RegisterController@showRegistrationForm')->name('showRegistrationForm');
    Route::post('register', 'RegisterController@create')->name('register.create');

    // Password Reset
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@forgot')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.showResetForm');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.reset');

    Route::group(['middleware' => 'auth:admin'], function () {
        // Logout
        Route::post('logout', 'LoginController@logout')->name('logout');
    });
    
});

Route::group(['middleware' => 'auth:admin'], function(){
    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    //Admins
    Route::put('admin/updateStatus/{admin}', 'AdminController@updateStatus')->name('admins.updateStatus');
    Route::put('admin/updatePassword/{admin}', 'AdminController@updatePassword')->name('admins.updatePassword');
    Route::resource('admins', 'AdminController');
});