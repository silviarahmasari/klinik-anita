<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\Dokter\DokterRequest;
use App\Models\User;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDokterController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $dokter = Dokter::all();
    $data = [
      'dokters' => $dokter
    ];
    return view('admin.dokter.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.dokter.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(DokterRequest  $reqDokter, UserRequest $reqUser)
  {
    
    $validatedDataUser = $reqUser->all();
    $validatedDataUser['role'] = "dokter";
    $validatedDataUser['isNewPassword'] = 0;
    $validatedDataUser['password'] =  Hash::make($reqUser->name);
    $user = User::create($validatedDataUser);

    $validatedDataDokter = $reqDokter->all();
    $validatedDataDokter['user_id'] =  $user->id;
    Dokter::create($validatedDataDokter);

    return redirect()->route('admin-dokter.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Dokter  $dokter
   * @return \Illuminate\Http\Response
   */
  public function show(Dokter $admin_dokter)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Dokter  $dokter
   * @return \Illuminate\Http\Response
   */
  public function edit(Dokter $admin_dokter)
  {
    $data = [
      'dokter' => $admin_dokter
    ];
    return view('admin.dokter.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Dokter  $dokter
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Dokter $admin_dokter)
  {
    $validatedData = $request->all();
    $admin_dokter->update($validatedData);
    return redirect()->route('admin-dokter.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Dokter  $dokter
   * @return \Illuminate\Http\Response
   */
  public function destroy(Dokter $admin_dokter)
  {
    $admin_dokter->delete();
    return redirect()->route('admin-dokter.index');
  }
}
