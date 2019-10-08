<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProvinceResource;
use App\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function getProvinces(){
        return ProvinceResource::collection(Province::all());
    }
}
