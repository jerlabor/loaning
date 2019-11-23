<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->json(Loan::all(),Response::HTTP_OK);
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
        $loan = new Loan;
        $loan->borrower_id = $request->borrower_id['id'];
        $loan->pension_code = $request->pension_code['id'];
        $loan->loan_type = $request->loan_type;
        $loan->principal_amount = $request->principal_amount;
        $loan->release_date = $request->release_date;
        $loan->term = $request->term;
        $loan->added_by = $request->user()->id;
        $loan->loan_status = 1;
        if($loan->save()){
            return response()->json($loan,Response::HTTP_CREATED );
        }else{
            return response()->json('Error',Response::HTTP_CONFLICT );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        return response()->json($loan->load(['pension',
            'borrower:id,first_name,middle_name,last_name,birthday,created_at',
            'repayments.collector:id,name','repaymentSummary:loan_id,total_paid'])->setAppends(['due','balance','maturity_date']),Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
