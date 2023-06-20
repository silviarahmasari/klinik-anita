<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    //index
    public function index(Request $request){
        return view('landing_page');
    }
}
