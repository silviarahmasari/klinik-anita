<?php

namespace App\Http\Controllers\RawatInap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RawatInap;
use App\Models\Kamar;
use Illuminate\Support\Facades\DB;

class RawatInapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rawat = RawatInap::select('*', 'rawat_inap.id as id_rawat')
        ->join('kamar','rawat_inap.id_kamar','=','kamar.id')->get();        ;
        if (Auth::user()->role == 'admin') {
          return view('admin.rawatinap.index', compact('rawat'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kamar = Kamar::all();
        return view('admin.rawatinap.create',compact('kamar'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_rm' => 'required',
            'nama_pasien' => 'required',
            'id_kamar' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
        ]);
        // dd($validatedData);
        RawatInap::create($validatedData);
        return redirect()->route('rawatinap.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rawat = RawatInap::find($id);
        $kamar = Kamar::all();
        return view('admin.rawatinap.edit', compact('rawat','kamar'));

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
        $rawat = RawatInap::find($id);
        $rawat -> no_rm = $request -> no_rm;
        $rawat -> nama_pasien = $request -> nama_pasien;
        $rawat -> id_kamar = $request -> id_kamar;
        $rawat -> check_in = $request -> check_in;
        $rawat -> check_out = $request -> check_out;
        $rawat -> save();
        

        return redirect()->route('rawatinap.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rawat = RawatInap::find($id);
        $rawat->delete();
        return redirect()->route('rawatinap.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verif(Request $post)
    {
        DB::table('rawat_inap')->where('id', $post->id)->update([
			'status_pembayaran' => $post->status_pembayaran,
        ]);
        return redirect()->route('rawatinap.index');
    }
}
