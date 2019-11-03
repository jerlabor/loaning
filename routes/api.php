<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/philippines/cities','CityController@getCities');
Route::get('/philippines/barangays','BarangayController@getBarangays');
Route::get('/philippines/provinces','ProvinceController@getProvinces');

Route::get('/referrers',function (){
    $users = DB::table('users')->select('id','name',DB::raw('COALESCE("referrer_id") as db_column'))->get();
    return response()->json($users);
});

Route::get('/dependent/relations',function (){
    return response()->json(DB::table('dependent_relations')->select('id','name')->get());
});

Route::get('/civil-status',function (){
    return response()->json(DB::table('civil_statuses')->select('id','name',DB::raw('COALESCE("civil_status") as db_column'))->get());
});


/*Borrower*/
Route::get('/borrowers/{borrower}/pensions','BorrowerController@pensions');
Route::get('/borrower/{borrower}','BorrowerController@show');


/*Pension*/
Route::get('/pension','PensionController@index');

/*Datatable*/
Route::get('/datatable/pension/{id}/loans','DatatablesController@loansByPension');
Route::get('/loans','DatatablesController@loans');
Route::get('/borrowers','DatatablesController@borrowers');

/*Loans*/
Route::get('/loan/{loan}','LoanController@show');

//Pension Type
Route::get('/pension/types','PensionTypeController@index');

//Banks
Route::get('/banks','BankController@index');

//Pension Agency
Route::get('/agency/pension','PensionAgencyController@index');

//Bank Type
Route::get('/bank/types','BankTypeController@index');
