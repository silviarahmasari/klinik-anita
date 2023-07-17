<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\User;
use App\Models\MetodeBayar;
use App\Http\Requests\Pasien\PasienRequest;

class AdminPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = Pasien::all();
        return view('admin.pasien.index', compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metode_bayar = MetodeBayar::all();
        $pasien = Pasien::all();
        $user = User::where('role', 'pasien')->get();
        return view('admin.pasien.create', compact('metode_bayar', 'pasien', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'dokter_id' => 'required',
            'tgl_datang' => Carbon::now(),
            'no_rm' => 'required',
            'nama_pasien' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat_pasien' => 'required',
            'agama' => 'required',
            'status_nikah' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            'pendidikan_terakhir' => 'required',
            'id_pembayaran' => 'required',
            'penanggung_jawab' => 'required',
            'no_telp' => 'required',
            'triase_tujuan' => 'required',
            'riwayat_penyakit' => 'required',
            'riwayat_alergi' => 'required',
        ]);
        // dd($validatedData);
        Pasien::create($validatedData);
        // dd($pasien);
        return redirect()->route('admin-pasien');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = Pasien::FindOrFail($id);

        $data = [
            'pasien' => $pasien
        ];

        return view('admin.pasien.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
