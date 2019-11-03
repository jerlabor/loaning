<?php

namespace App\Http\Controllers;

use App\PensionType;
use Illuminate\Http\Request;

class PensionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PensionType::all(['id','pension_type']));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PensionType  $pensionType
     * @return \Illuminate\Http\Response
     */
    public function show(PensionType $pensionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PensionType  $pensionType
     * @return \Illuminate\Http\Response
     */
    public function edit(PensionType $pensionType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PensionType  $pensionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PensionType $pensionType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PensionType  $pensionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PensionType $pensionType)
    {
        //
    }
}
