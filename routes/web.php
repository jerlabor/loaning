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



Auth::routes();

Route::get('/{any}', 'AppController@index')->where('any','.*');

Route::resource('borrower','BorrowerController');

/*Pension*/
Route::resource('pension','PensionController');

/*Loan*/
Route::resource('loan','LoanController');


