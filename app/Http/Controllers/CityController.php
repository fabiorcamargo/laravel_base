<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function get($city)
    {
        //dd($city);
        $cities = City::where('state_id', $city)->get();
        (json_encode($cities));
        return response()->json($cities);
    }
}
