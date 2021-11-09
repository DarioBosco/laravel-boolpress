<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

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
Auth::routes();

//Landing Page
Route::get('/', function () {
    return view('welcome');
})->name('homepage');

//Login confirmation page
Route::get('/home', 'HomeController@index')->name('home');

//Back Office
Route::middleware('auth')->namespace('Admin')->prefix('dashboard')->name('admin.')->group(function() {

    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('/posts', 'PostController');
    Route::resource('/categories', 'CategoryController');

});

//Front Office
Route::prefix('posts')->group(function() {

    Route::get('/', 'PostController@index')->name('posts_index');
    Route::get('/{slug}', 'PostController@show')->name('posts_detail');
});

