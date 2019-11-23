<?php

namespace App\Http\Controllers;

use App\Borrower;
use App\Http\Requests\StoreBorrower;
use App\Http\Resources\BorrowerResource;
use App\Http\Resources\PensionResource;
use App\Pension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Borrower::withCount(['loans'])->get(),Response::HTTP_OK);
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
    public function store(StoreBorrower $request)
    {


        $borrower = DB::transaction(function () use($request){

            $borrower = Borrower::create($request->validated());


            /*store referrers*/
            if($request->has('referrals')){

                $referrerToBeInsertedArr = [];

                foreach ($request->referrals as $referral){
                    array_push($referrerToBeInsertedArr,new \App\Referral(['referral_name' => $referral['referral_name']]));
                }

                $borrower->referrals()->saveMany($referrerToBeInsertedArr);
            }

            //Store If Has Dependents
            if(count($request->dependents) !== 0){
                $dependents = array_map(function ($dependent){
                    return new \App\Dependent(['name' => $dependent['name'],'relation' => (int)$dependent['relationship'],'birthday' => $dependent['birthday']]);
                },$request->dependents);

                $borrower->dependents()->saveMany($dependents);
            }

            //Store If Has Neighbours
            if(count($request->neighbours) !== 0){
                $neighbours = array_map(function ($neighbor){
                    return new \App\Neighbor(['name' => $neighbor['name']]);
                },$request->neighbours);

                $borrower->neighbours()->saveMany($neighbours);
            }

            //Add If Has Spouse
            if($request->civil_status !== 1 && $request->has('spouse')){

                $validated = Validator::make($request->spouse,[
                    'COD' => 'nullable|string',
                    'POM' => 'required|numeric',
                    'date_married' => 'required|date',
                    'date_died' => 'nullable|date',
                    'name' => 'required|string',
                ])->validate();

                $borrower->spouse()->create($validated);
            }

            if($request->has('ctc')){
                $validated = Validator::make($request->ctc,[
                    'ctc_num' => 'required|numeric',
                    'ctc_date_issued' => 'required|date',
                    'ctc_city_issued' => 'required|numeric',
                ])->validate();

                $borrower->ctc()->create($validated);
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
        return response()->json($borrower->loadCount('loans'),Response::HTTP_OK);
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
