<?php

namespace App\Http\Controllers\Pengumuman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = Pengumuman::all();
        if (Auth::user()->role == 'admin') {
          return view('admin.pengumuman.index', compact('pengumuman'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengumuman.create');
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
            'judul_pengumuman' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'gambar' => 'required|image'
        ]);

        // Get Filename
        $filename = $request->file('gambar')->getClientOriginalName();
        //Filename to Store
        $fileNameToStore = date('dmyHis').'-'.$filename;
        $path = $request->file('gambar')->storeAs('public/gambar-pengumuman', $fileNameToStore);
        $validatedData['gambar'] = $fileNameToStore;

        Pengumuman::create($validatedData);
        return redirect()->route('pengumuman.index');
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->get();
        return view('admin.pengumuman.show', compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.edit', compact('pengumuman'));
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
        $pengumuman = Pengumuman::find($id);
    
        // Get File
        if($file = $request->file('gambar')) {
            if(Storage::exists('public/gambar-pengumuman'.'/'.$pengumuman->gambar)){
                Storage::delete('public/gambar-pengumuman'.'/'.$pengumuman->gambar);
            }
            // Get Filename
            $filename = $file->getClientOriginalName();
            //Get just extension
            $extension = $file->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $file->storeAs('public/gambar-pengumuman',$fileNameToStore);

            $pengumuman -> gambar = $fileNameToStore;
        }
        $pengumuman -> judul_pengumuman = $request -> judul_pengumuman;
        $pengumuman -> deskripsi = $request -> deskripsi;
        $pengumuman -> tanggal = $request -> tanggal;
        $pengumuman -> save();

        return redirect()->route('pengumuman.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();
        return redirect()->route('pengumuman.index');
    }
}
