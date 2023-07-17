<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Perjanjian;
use App\Models\Kunjungan;
use App\Models\RawatInap;
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
    $AllPasien = Pasien::all()->collect()->count();
    $AllDokter = Dokter::all()->collect()->count();
    $AllObat = Obat::all()->collect()->count();
    $AllKunjungan = Kunjungan::all()->collect()->count();
    $AllRawatInap = RawatInap::all()->collect()->count();
    $perjanjian = Perjanjian::where('nama_dokter', Auth::user()->name)->get();
    $checkPasien = Pasien::where('user_id', Auth::user()->id)->count();
    $kunjungan = Kunjungan::where('user_id', Auth::user()->id)->count();
    $data = [
      'AllPasien' => $AllPasien,
      'AllDokter' => $AllDokter,
      'AllObat' => $AllObat,
      'AllKunjungan' => $AllKunjungan,
      'AllRawatInap' => $AllRawatInap,
      'perjanjians' => $perjanjian,
      'checkPasien' => $checkPasien,
      'kunjungan' => $kunjungan
    ];
    return view('home', $data);
  }
}
