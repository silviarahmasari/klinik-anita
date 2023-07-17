<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\KritikSaran;


class LandingpageController extends Controller
{
    //index
    public function index(Request $request){
        $pengumuman = Pengumuman::all();
        $saran = KritikSaran::all();
        return view('landing_page', compact('pengumuman','saran'));
    }
}
