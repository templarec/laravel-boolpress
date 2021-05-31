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


Route::get('/', 'HomeController@index')->name('index');
Route::get('posts/{slug}', 'PostController@show')->name('posts.show');
Route::get('categories/{slug}', 'CategoryController@index')->name('category.index');
Route::get('tags/{slug}', 'TagController@index')->name('tags.show');
Auth::routes();


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('index');
        Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
        Route::resource('posts', 'PostController');
        Route::resource('categories', 'CategoryController');
        Route::resource('tags', 'TagController');

    });
