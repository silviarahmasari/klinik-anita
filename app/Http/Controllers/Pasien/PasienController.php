<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Requests\Pasien\PasienRequest;
use App\Http\Requests\Kunjungan\KunjunganRequest;
use App\Http\Requests\KritikSaran\kritikSaranRequest;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\kunjungan;
use App\Models\Perjanjian;
use App\Models\RekamMedis;
use App\Models\RawatInap;
use App\Models\kritikSaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Support\Facades\App;
use PDF;
use DB;

class PasienController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    if (Auth::user()->role == 'dokter') {
      // $pasien = Pasien::with(['dokter'])->get();
      $dokter = Dokter::where('user_id', Auth::user()->id)->first();
      $pasiens = DB::table('pasiens')
      ->join('rekam_medis', 'rekam_medis.pasien_id', '=', 'pasiens.id')
      ->where('rekam_medis.dokter_id', $dokter->id)
      ->groupBy('pasiens.id')
      ->select('pasiens.*')
      ->get();
      $obat = Obat::with('pasien')->get();
      // $
      $data = [
        'pasiens' => $pasiens,
        'obats' => $obat
      ];

      return view('dokter.pasien.index', $data);
    }

    $perjanjians = Perjanjian::with('pasien')->where('pasien_id', Auth::user()->id)->get();
    $data  = [
      'pasiens' => $perjanjians
    ];
    return view('pasien.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $dokter = Dokter::all();
    $data  = [
      'dokters' => $dokter
    ];
    return view('pasien.create', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PasienRequest $request)
  {
    $validatedData = $request->all();
    // dd($validatedData);
    $validatedData['tgl_datang'] = Carbon::now();
    Pasien::create($validatedData);
    return redirect()->route('dokter.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pasien  $pasien
   * @return \Illuminate\Http\Response
   */
  public function show(Pasien $pasien)
  {
    $data = [
      'pasien' => $pasien
    ];

    if (Auth::user()->role == 'dokter') {
      return view('dokter.pasien.show', $data);
    }
    return view('dokter.show', $data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pasien  $pasien
   * @return \Illuminate\Http\Response
   */
  public function edit(Pasien $pasien)
  {
    $dokters = Dokter::all();
    $obats = Obat::all();
    $data = [
      'pasien' => $pasien,
      'obats' => $obats,
      'dokters' => $dokters
    ];
    return view('dokter.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pasien  $pasien
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Pasien $pasien)
  {
    $validatedData = $request->all();
    $validatedData['tgl_datang'] = $pasien->tgl_datang;
    // return $validatedData;
    $pasien->update($validatedData);
    return redirect()->route('dokter.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pasien  $pasien
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pasien $pasien)
  {
    $perjanjian = Perjanjian::where('nama_pasien', $pasien->nama_pasien)->delete();
    $pasien->delete();
    return redirect()->route('pasien.index');
  }

  public function generatePDF(Pasien $pasien)
  {
    $dataPasien = Pasien::with('dokter')->where('nama_pasien', $pasien->nama_pasien)->get();
    // $data = [
    //   'pasiens' => $dataPasien
    // ];
    // return view('cetak-pasien', $data);
    // dd($dataPasien);
    $data = $dataPasien;
    view()->share('pasiens', $data);
    $pdf = PDF::loadView('cetak-pasien', $data);
    return $pdf->download($pasien->nama_pasien . '.pdf');
  }

  public function profile() {
    $checkPasien = Pasien::where('user_id', Auth::user()->id)->count();
    $pasien = pasien::where('user_id', Auth::user()->id)->first();
    // dd($pasien);
    return view('pasien.profile', compact('pasien', 'checkPasien'));
  }

  public function profileInsert(PasienRequest $request, Pasien $pasien) {
    $validatedData = $request->all();
    $validatedData['user_id'] = Auth::user()->id;
    $validatedData['tgl_datang'] = Carbon::now();
    // dd($validatedData);
    Pasien::create($validatedData);
    return redirect()->route('pasien.profile');    
  }

  public function profileUpdate(PasienRequest $tes, $id) {
    $validatedData = $tes->all();
    $pasien = Pasien::findOrFail($id);
    $pasien->fill($validatedData);
    $pasien->save();

    return redirect()->route('pasien.profile');
    // $pasien->udpate($validatedData);
  }

  public function kunjungan() {
    $pasien = Pasien::where('user_id', Auth::user()->id)->first();
    $date = Carbon::today()->toDateString();
    $checkPasien = Pasien::where('user_id', Auth::user()->id)->count();
    $kunjungan = Kunjungan::where('tgl_kunjungan', '>=', $date)
                ->where('user_id', Auth::user()->id)
                ->orderBy('tgl_kunjungan', 'asc')
                ->get();
    return view('pasien.kunjungan', compact('pasien', 'checkPasien', 'kunjungan'));
  }

  public function ambilAntrian() {
    $pasien = Pasien::where('user_id', Auth::user()->id)->first();
    $checkPasien = Pasien::where('user_id', Auth::user()->id)->count();
    return view('pasien.ambilAntrian', compact('pasien', 'checkPasien'));
  }

  public function kunjunganInsert(KunjunganRequest $request) {
    $validatedData = $request->all();
    $kunjungan = kunjungan::where('tgl_kunjungan', $validatedData['tgl_kunjungan'])->count();
    $validatedData['no_antrian'] = $kunjungan+1;
    $validatedData['user_id'] = Auth::user()->id;
    Kunjungan::create($validatedData);
    return redirect()->route('pasien.kunjungan');
  }

  public function riwayatKunjungan() {
    $kunjungan = kunjungan::where('user_id', Auth::user()->id)->get();
    return view('pasien.riwayatKunjungan', compact('kunjungan'));
  }

  public function riwayatRawatInap() {
    $rawatInap = RawatInap::where('user_id', Auth::user()->id)->get();
    return view('pasien.riwayatRawatInap', compact('rawatInap'));
  }

  public function rekamMedis() {
    $rekam_medis_pasien = RekamMedis::with('rekam_medis_pasien', 'rekam_medis_dokter')->get();
    $pasien = pasien::where('user_id', Auth::user()->id)->first();
    $checkPasien = Pasien::where('user_id', Auth::user()->id)->count();
    return view('pasien.rekamMedis', compact('pasien', 'rekam_medis_pasien', 'checkPasien'));
  }

  public function kritikSaran() {
    $checkPasien = Pasien::where('user_id', Auth::user()->id)->count();
    return view('pasien.kritikSaran', compact('checkPasien'));
  }

  public function kritikSaranInsert(kritikSaranRequest $request) {
    $validatedData = $request->all();
    $validatedData['user_id'] = Auth::user()->id;
    $validatedData['nama_pelanggan'] = Auth::user()->name;
    kritikSaran::create($validatedData);
    return redirect()->route('home');
  }
}
