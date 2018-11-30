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

/*
// DEFAULT AUTHENTICATION ROUTES
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
//*/


Route::get('/', function () {
    return view('mainpage');
});


// is-vartotojas
Route::get('/book-list', 'BookController@listBooks');
Route::get('/book-view/{id}', 'BookController@viewBook')->name('book.view');

// administratorius
Route::post('/book-delete/{id}', 'BookController@deleteBook')->name('book.delete');

Route::post('/book-edit/{id}', 'BookController@editBookData')->name('book.edit-data');
Route::get('/book-edit/{id}', 'BookController@editBook')->name('book.edit');

Route::post('/book-create', 'BookController@createBookData')->name('book.create-data');
Route::get('/book-create', 'BookController@createBook')->name('book.create');


Route::post('/bookcopy-create', 'BookController@createCopy')->name('bookcopy.create');

Route::post('/bookcopy-delete', 'BookController@deleteCopy')->name('bookcopy.delete');

// vartotojas
Route::post('/book-rate', 'BookController@rate')->name('book.rate');



