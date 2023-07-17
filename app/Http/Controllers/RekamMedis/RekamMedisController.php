<?php

namespace App\Http\Controllers\RekamMedis;

use App\Http\Controllers\Controller;
use App\Http\Requests\RekamMedis\RekamMedisRequest;
use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Obat;
use Illuminate\Support\Facades\Auth;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter = Dokter::where('user_id', Auth::user()->id)->first();

        $rekam_medis = RekamMedis::with('rekam_medis_pasien', 'rekam_medis_dokter')
        ->whereIn('id', function ($query) {
            $query->selectRaw('MAX(id)')
                ->from('rekam_medis')
                ->groupBy('pasien_id');
        })
        ->where('dokter_id', $dokter->id)
        ->get();

        $data = [
            'rekam_medis_lists' => $rekam_medis
        ];
    
        return view('dokter.rekam_medis.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        $obat = Obat::all();

        $data = [
            'pasiens' => $pasien,
            'dokters' => $dokter,
            'obats' => $obat
        ];
    
        return view('dokter.rekam_medis.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RekamMedisRequest $request)
    {
        // dd($request->all());
        $dokter = Dokter::where('user_id', Auth::user()->id)->first();

        $validatedData = $request->all();
        $validatedData['dokter_id'] = $dokter->id;
        $validatedData['obat'] = implode(", ", $request->obat);
        RekamMedis::create($validatedData);
        return redirect()->route('rekam-medis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RekamMedis $rekam_medis)
    {
        $rekam_medis = RekamMedis::with('rekam_medis_pasien', 'rekam_medis_dokter')
        ->get();

        $data = [
            'rekam_medis_pasien' => $rekam_medis
        ];

        return view('dokter.rekam_medis.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamMedis $rekam_medis)
    {
        $rekam_medis = RekamMedis::with('rekam_medis_pasien', 'rekam_medis_dokter')
        ->where('dokter_id', Auth::user()->id)
        ->first();
        dd(Auth::user()->id);
        $rekam_medis_obat = explode(", ", $rekam_medis->obat);

        $pasien = Pasien::all();
        $dokter = Dokter::all();
        $obat = Obat::all();

        $data = [
            'rekam_medis' => $rekam_medis,
            'rekam_medis_obat' => $rekam_medis_obat,
            'pasiens' => $pasien,
            'dokters' => $dokter,
            'obats' => $obat
        ];
    
        return view('dokter.rekam_medis.edit', $data);
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
        // dd($request->all());
        $validatedData = $request->all();
        $validatedData['obat'] = implode(", ", $request->obat);
        // $rekam_medis->update($validatedData);
        $rekam_medis = RekamMedis::findOrFail($id);
        $rekam_medis->fill($validatedData);
        $rekam_medis->save();
        return redirect()->route('rekam-medis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rekam_medis = RekamMedis::findOrFail($id);
        $rekam_medis->delete();
        return redirect()->route('rekam-medis.index');
    }
}
