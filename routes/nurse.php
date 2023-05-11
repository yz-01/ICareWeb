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

    Route::group(['middleware' => 'auth:nurse'], function () {
        // Logout
        Route::post('logout', 'LoginController@logout')->name('logout');
    });
});

Route::group(['middleware' => 'auth:nurse'], function () {
    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('call', 'DashboardController@call')->name('call');
    Route::post('callStore', 'DashboardController@callStore')->name('callStore');

    //Nurse
    Route::put('nurse/updateStatus/{nurse}', 'NurseController@updateStatus')->name('nurses.updateStatus');
    Route::put('nurse/updatePassword/{nurse}', 'NurseController@updatePassword')->name('nurses.updatePassword');
    Route::resource('nurses', 'NurseController');

    //Treatment
    Route::get('treatments/history', 'TreatmentController@history')->name('treatments.history');
    Route::get('treatments/historyCreate', 'TreatmentController@historyCreate')->name('treatments.historyCreate');
    Route::get('treatments/historyEdit', 'TreatmentController@historyEdit')->name('treatments.historyEdit');
    Route::get('treatments/historyShow', 'TreatmentController@historyShow')->name('treatments.historyShow');
    Route::get('treatments/historyDelete', 'TreatmentController@historyDelete')->name('treatments.historyDelete');
    Route::get('treatments/deleteDataMedicine', 'TreatmentController@deleteDataMedicine')->name('treatments.deleteDataMedicine');
    Route::get('treatments/deleteDataDoctor', 'TreatmentController@deleteDataDoctor')->name('treatments.deleteDataDoctor');
    Route::get('treatments/deleteDataNurse', 'TreatmentController@deleteDataNurse')->name('treatments.deleteDataNurse');
    Route::get('treatments/getWardList', 'TreatmentController@getWardList')->name('treatments.getWardList');
    Route::post('treatments/historyStore', 'TreatmentController@historyStore')->name('treatments.historyStore');
    Route::post('treatments/historyUpdate', 'TreatmentController@historyUpdate')->name('treatments.historyUpdate');
    Route::resource('treatments', 'TreatmentController');

    //Schedule
    Route::resource('schedules', 'ScheduleController');
});
