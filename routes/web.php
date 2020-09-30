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

Route::get('/index', 'FrontController@index');

Route::get('/contact_us', 'FrontController@contact_us');

Route::get('/news', 'FrontController@news');

Route::get('/news_info/{news_id}', 'FrontController@news_info');

Route::get('/animals', 'FrontController@animals');

Route::get('/animals_info/{animals_id}', 'FrontController@animals_info'); //{number}物件number,問老師...

Route::post('/store_contact', 'FrontController@store_contact');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
