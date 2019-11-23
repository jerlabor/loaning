<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePension;
use App\Http\Resources\PensionResource;
use App\Pension;
use App\VPension;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PensionResource::collection(VPension::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePension $request)
    {
       $pension =  Pension::create($request->validated());

       if($pension){
           return response()->json($pension,Response::HTTP_OK);
       }
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
