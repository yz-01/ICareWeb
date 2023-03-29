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
Route::get('addtocart/{course}', 'CartController@addtoCart')->name('addtocart');
Route::get('course/{course}', 'CourseController@show')->name('course');
Route::get('course-list/', 'CourseController@courselist')->name('courselist');
Route::get('course-list/{trainer}', 'CourseController@courselistTrainer')->name('courselistTrainer');
Route::get('checkoutform', 'CartController@checkoutform')->name('checkoutform');
Route::post('checkout', 'CartController@checkout')->name('checkout');
Route::get('cart-del/{cart}', 'CartController@delete')->name('cartDelete');

