<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');


Route::get('/', 'HomeController@index')->name('welcome');
Route::get('tnc', 'HomeController@tnc')->name('tnc');
Route::get('reward_tnc', 'HomeController@reward_tnc')->name('reward_tnc');
Route::resource('home', 'HomeController');

Route::resource('profile', 'ProfileController');
Route::resource('cart', 'CartController');

