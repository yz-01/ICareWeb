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

Route::group(['middleware' => 'auth:admin'], function () {
    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    //Admins
    Route::put('admin/updateStatus/{admin}', 'AdminController@updateStatus')->name('admins.updateStatus');
    Route::put('admin/updatePassword/{admin}', 'AdminController@updatePassword')->name('admins.updatePassword');
    Route::resource('admins', 'AdminController');

    //Doctor
    Route::put('doctor/updateStatus/{doctor}', 'DoctorController@updateStatus')->name('doctors.updateStatus');
    Route::put('doctor/updatePassword/{doctor}', 'DoctorController@updatePassword')->name('doctors.updatePassword');
    Route::resource('doctors', 'DoctorController');

    //Nurse
    Route::put('nurse/updateStatus/{nurse}', 'NurseController@updateStatus')->name('nurses.updateStatus');
    Route::put('nurse/updatePassword/{nurse}', 'NurseController@updatePassword')->name('nurses.updatePassword');
    Route::resource('nurses', 'NurseController');

    //Patient
    Route::put('patient/updateStatus/{patient}', 'PatientController@updateStatus')->name('patients.updateStatus');
    Route::put('patient/updatePassword/{patient}', 'PatientController@updatePassword')->name('patients.updatePassword');
    Route::resource('patients', 'PatientController');

    //Branch
    Route::put('branch/updateStatus/{branch}', 'BranchController@updateStatus')->name('branches.updateStatus');
    Route::resource('branches', 'BranchController');

    //Room Type
    Route::put('roomType/updateStatus/{roomType}', 'RoomTypeController@updateStatus')->name('roomTypes.updateStatus');
    Route::resource('roomTypes', 'RoomTypeController');

    //Room
    Route::put('room/updateStatus/{room}', 'RoomController@updateStatus')->name('rooms.updateStatus');
    Route::resource('rooms', 'RoomController');

    //Ward
    Route::get('wards/deleteDataWard', 'WardController@deleteDataWard')->name('wards.deleteDataWard');
    Route::get('wards/getRoomList', 'WardController@getRoomList')->name('wards.getRoomList');
    Route::put('ward/updateStatus/{ward}', 'WardController@updateStatus')->name('wards.updateStatus');
    Route::resource('wards', 'WardController');

    //Announcement
    Route::resource('announcements', 'AnnouncementController');

    //Medicine
    Route::resource('medicines', 'MedicineController');

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
