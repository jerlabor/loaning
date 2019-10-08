<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Resources\CityResource;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCities(){
        return CityResource::collection(City::all());
    }

}
