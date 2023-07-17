<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Perjanjian;
use App\Models\kunjungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $pasien = Pasien::all()->collect()->count();
    $dokter = Dokter::all()->collect()->count();
    $obat =  Obat::all()->collect()->count();
    $perjanjian = Perjanjian::where('nama_dokter', Auth::user()->name)->get();
    $checkPasien = Pasien::where('user_id', Auth::user()->id)->count();
    $kunjungan = kunjungan::where('user_id', Auth::user()->id)->count();
    $data = [
      'pasien' => $pasien,
      'dokter' => $dokter,
      'obat' => $obat,
      'perjanjians' => $perjanjian,
      'checkPasien' => $checkPasien,
      'kunjungan' => $kunjungan
    ];
    return view('home', $data);
  }
}
