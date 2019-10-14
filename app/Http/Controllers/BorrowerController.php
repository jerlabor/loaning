<?php

namespace App\Http\Controllers;

use App\Borrower;
use App\Http\Resources\PensionResource;
use App\Pension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $borrower = DB::transaction(function () use($request){
            $borrower = new Borrower;


            $borrower->first_name = $request->first_name;
            $borrower->middle_name = $request->middle_name;
            $borrower->last_name = $request->last_name;
            $borrower->birthday = $request->birthday;
            $borrower->gender = $request->gender;
            $borrower->referrer_id = (int)$request->referrer_id['id'];
            $borrower->barangay_captain = $request->brgyCapt;
            $borrower->street = $request->street;
            $borrower->city = (int)$request->city['id'];
            $borrower->barangay = (int)$request->barangay['id'];
            $borrower->province = (int)$request->province['id'];
            $borrower->other_SOI = $request->otherSOI;
            $borrower->ctc_num = $request->ctc_num;
            $borrower->ctc_date_issued = $request->ctc_date_issued;
            if(isset($request->ctc_date_issued)){
                $borrower->ctc_city_issued = (int)$request->ctc_city_issued['id'];
            }
            $borrower->contact_num = $request->contact_num;
            $borrower->civil_status = $request->civil_status;

            $borrower->save();

            if(count($request->dependents) !== 0){
                $dependents = array_map(function ($dependent){
                    return new \App\Dependent(['name' => $dependent['name'],'relation' => (int)$dependent['relationship'],'birthday' => $dependent['birthday']]);
                },$request->dependents);

                $borrower->dependents()->saveMany($dependents);
            }

            if(count($request->neighbours) !== 0){
                $neighbours = array_map(function ($neighbor){
                    return new \App\Neighbor(['name' => $neighbor['name']]);
                },$request->neighbours);

                $borrower->neighbours()->saveMany($neighbours);
            }

            if($request->civil_status !== 1){

                $borrower->spouse()->create(['name' => $request->spouse['name'],'date_married' => $request->spouse['dateMarried'],'POM' => $request->spouse['POM']['id'],'COD' => $request->spouse['COD'],'date_died' => $request->spouse['dateDied']]);
            }

            return $borrower;
        });

        if($borrower){
            return response(['borrower_id' => $borrower->id],201);
        }else{

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function show(Borrower $borrower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrower $borrower)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrower $borrower)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrower $borrower)
    {
        //
    }

    public function pensions($borrower){
        return PensionResource::collection(Pension::whereBorrowerId($borrower)->get());
    }
}
