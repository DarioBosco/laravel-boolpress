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

/* //Front Office
Route::get('/posts', 'PostController@index')->name('user-posts');
Route::get('/posts/{slug}', 'PostController@show')->name('user-posts-detail');
Route::resource('/posts', 'PostController'); */

//Login confirmation page
Route::get('/home', 'HomeController@index')->name('home');

//Back Office
Route::middleware('auth')->namespace('Admin')->prefix('dashboard')->name('admin.')->group(function() {
    
    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('/posts', 'PostController');
    
});
