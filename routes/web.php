<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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
Route::get('dashboard', 'App\Http\Controllers\CustomAuthController@dashboard')->name('dashboard');
Route::post('custom-login', 'App\Http\Controllers\CustomAuthController@customLogin')->name('login.custom'); 
Route::get('\login','App\Http\Controllers\CustomAuthController@login')->name('login');
Route::get('registration','App\Http\Controllers\CustomAuthController@registration' )->name('register-user');
Route::post('custom-registration', 'App\Http\Controllers\CustomAuthController@customRegistration')->name('register.custom'); 
Route::get('signout', 'App\Http\Controllers\CustomAuthController@signOut')->name('signout');
Route::get('profile','App\Http\Controllers\AccountsController@profile')->name('profile');
Route::post('create-profile','App\Http\Controllers\AccountsController@createProfile')->name('create.profile');
Route::get('statement','App\Http\Controllers\AccountsController@statement')->name('statement');
Route::get('transfer','App\Http\Controllers\AccountsController@transfer')->name('transfer');
Route::get('withdraw','App\Http\Controllers\AccountsController@withdraw')->name('withdraw');
Route::get('deposit','App\Http\Controllers\AccountsController@deposit')->name('deposit');
Route::post('deposit-amount','App\Http\Controllers\AccountsController@depositAmount')->name('create.deposit');
Route::post('withdraw-amount','App\Http\Controllers\AccountsController@withdrawAmount')->name('create.withdraw');
Route::post('transfer-amount','App\Http\Controllers\AccountsController@transferAmount')->name('create.transfer');
Route::get('list-statement','App\Http\Controllers\AccountsController@ListStatement')->name('list.statement');