<?php

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

Route::get('/', 'HomeController');

/**
 *  Routes to login
 */
Route::get('/login', 'LoginController@index')->name('web.login.index');
Route::post('/login', 'LoginController@login')->name('web.login.post');

/**
 *  Recover password
 */

Route::get('/password/reset', 'PasswordController@index')->name('web.password.index');
Route::post('/password/reset', 'PasswordController@reset')->name('web.password.reset');

Route::get('/password/new/{token}', 'PasswordController@new')->name('web.password.new');
Route::post('/password/new', 'PasswordController@storeNew')->name('web.password.storeNew');
