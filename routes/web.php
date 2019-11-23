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



Auth::routes(
    [
        'verify' => false,
        'reset' => false
    ]
);

Route::get('/print/test',function(){
   return view('print.loan_application');
});
Route::post('/repayment','RepaymentController@store');
Route::post('/borrower','BorrowerController@store');
Route::post('/pension','PensionController@store');
Route::post('/loan','LoanController@store');
Route::get('/{any}', 'AppController@index')->where('any','.*');








