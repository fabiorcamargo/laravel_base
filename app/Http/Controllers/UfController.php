<?php

namespace App\Http\Controllers;

use App\Models\States;
use Illuminate\Http\Request;

class UfController extends Controller
{
    public function get()
    {
        
        $uf = States::get();
        //dd((json_encode($uf)));
        return response()->json($uf);
    }
}
