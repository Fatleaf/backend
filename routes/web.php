<?php

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
// });


Route::get('/', 'FrontController@index');

Route::get('/index.html', 'FrontController@index');

Route::get('/contact_us.html', 'FrontController@contact_us');

Route::get('/news.html', 'FrontController@news');

Route::get('/news_info.html', 'FrontController@news_info');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
