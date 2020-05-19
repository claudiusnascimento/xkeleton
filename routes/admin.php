<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/', 'DashboardController@index')
    ->name('admin.dashboard');

Route::get('/stats', 'DashboardController@stats')
    ->name('admin.stats');

Route::post('/logout', 'LogoutController@logout')
    ->name('admin.logout');

Route::resource('users', 'UserController')
    ->except(['show']);

Route::resource('pages', 'PageController')
    ->except(['show']);

Route::resource('posts', 'PostController')
    ->except(['show']);

Route::resource('post-categories', 'PostCategoryController')
    ->except(['show']);

Route::post('/image/upload', 'UploadController@upload')
    ->name('admin.image.upload');
Route::post('/image/delete', 'UploadController@delete')
    ->name('admin.image.delete');
