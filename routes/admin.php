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

    //Agent
    Route::put('agent/updateStatus/{agent}', 'AgentController@updateStatus')->name('agents.updateStatus');
    Route::put('agent/updatePassword/{agent}', 'AgentController@updatePassword')->name('agents.updatePassword');
    Route::resource('agents', 'AgentController');

    //Merchant
    Route::put('merchant/updateStatus/{merchant}', 'MerchantController@updateStatus')->name('merchants.updateStatus');
    Route::put('merchant/updatePassword/{merchant}', 'MerchantController@updatePassword')->name('merchants.updatePassword');
    Route::resource('merchants', 'MerchantController');

    //CenterUser
    Route::put('center_user/updateStatus/{center_user}', 'CenterUserController@updateStatus')->name('center_users.updateStatus');
    Route::put('center_user/updatePassword/{center_user}', 'CenterUserController@updatePassword')->name('center_users.updatePassword');
    Route::resource('center_users', 'CenterUserController');

    //Trainer
    Route::put('trainer/updateStatus/{trainer}', 'TrainerController@updateStatus')->name('trainers.updateStatus');
    Route::put('trainer/updatePassword/{trainer}', 'TrainerController@updatePassword')->name('trainers.updatePassword');
    Route::resource('trainers', 'TrainerController');

    //CompanyUser
    Route::put('company_user/updateStatus/{company_user}', 'CompanyUserController@updateStatus')->name('company_users.updateStatus');
    Route::put('company_user/updatePassword/{company_user}', 'CompanyUserController@updatePassword')->name('company_users.updatePassword');
    Route::resource('company_users', 'CompanyUserController');

    //Customer
    Route::put('customer/updateStatus/{customer}', 'CustomerController@updateStatus')->name('customers.updateStatus');
    Route::put('customer/updatePassword/{customer}', 'CustomerController@updatePassword')->name('customers.updatePassword');
    Route::resource('customers', 'CustomerController');
});