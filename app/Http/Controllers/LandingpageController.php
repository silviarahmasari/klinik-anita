<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;


class LandingpageController extends Controller
{
    //index
    public function index(Request $request){
        $pengumuman = Pengumuman::all();
        return view('landing_page', compact('pengumuman'));
    }
}
