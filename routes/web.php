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

Route::get('/', function () {
    return view('welcome');
});

//Login Route
Route::post('/android/login', 'AndroidUserController@login');

//Register Route
Route::post('/android/register', 'AndroidUserController@register');

//Admin Route
Route::get('/android/admin', 'AndroidAdminController@index');
Route::post('/android/admin/create', 'AndroidAdminController@create');
Route::post('/android/admin/edit', 'AndroidAdminController@edit');
Route::post('/android/admin/update', 'AndroidAdminController@update');
Route::post('/android/admin/destroy', 'AndroidAdminController@destroy');

//Book Route
Route::get('/android/book', 'AndroidBookController@index');
Route::post('/android/book/create', 'AndroidBookController@create');
Route::post('/android/book/edit', 'AndroidBookController@edit');
Route::post('/android/book/update', 'AndroidBookController@update');
Route::post('/android/book/destroy', 'AndroidBookController@destroy');

//BorrowBook Route
Route::get('/android/borrowbook', 'AndroidBorrowBookController@index');
Route::post('/android/borrowbook/create', 'AndroidBorrowBookController@create');
Route::post('/android/borrowbook/edit', 'AndroidBorrowBookController@edit');
Route::post('/android/borrowbook/update', 'AndroidBorrowBookController@update');
Route::post('/android/borrowbook/destroy', 'AndroidBorrowBookController@destroy');

//Member Route
Route::get('/android/member', 'AndroidMemberController@index');
Route::post('/android/member/create', 'AndroidMemberController@create');
Route::post('/android/member/edit', 'AndroidMemberController@edit');
Route::post('/android/member/update', 'AndroidMemberController@update');
Route::post('/android/member/destroy', 'AndroidMemberController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

route::resource('book', 'BookController');
route::resource('admin', 'AdminController');
route::resource('member', 'MemberController');
route::resource('borrow_book', 'BorrowBookController');
