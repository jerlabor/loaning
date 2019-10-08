<?php

namespace App\Http\Controllers;

use App\Barangay;
use App\Http\Resources\BarangayResource;
use Illuminate\Http\Request;

class BarangayController extends Controller
{
    public function getBarangays(){
        return BarangayResource::collection(Barangay::all());
    }
}
