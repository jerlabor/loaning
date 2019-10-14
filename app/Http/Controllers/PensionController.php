<?php

namespace App\Http\Controllers;

use App\Pension;
use Illuminate\Http\Request;

class PensionController extends Controller
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
        $pension = new Pension();

        $pension->pension_type = $request->pension_type;
        $pension->pension_bank = $request->pension_bank;
        $pension->bank_branch = $request->bank_branch;
        $pension->bank_type = $request->bank_type;
        $pension->pension_agency = $request->pension_agency;
        $pension->payday = $request->payday;
        $pension->pension = $request->pension;
        $pension->borrower_id = $request->borrower_id;
        $pension->added_by = $request->user()->id;

        $pension->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pension  $pension
     * @return \Illuminate\Http\Response
     */
    public function show(Pension $pension)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pension  $pension
     * @return \Illuminate\Http\Response
     */
    public function edit(Pension $pension)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pension  $pension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pension $pension)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pension  $pension
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pension $pension)
    {
        //
    }
}
