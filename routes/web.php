<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDokterController;
use App\Http\Controllers\Admin\AdminPasienController;
use App\Http\Controllers\Dokter\DokterController;
use App\Http\Controllers\Obat\ObatController;
use App\Http\Controllers\Pasien\PasienController;
use App\Http\Controllers\Perjanjian\PerjanjianController;
use App\Http\Controllers\Pengumuman\PengumumanController;
use App\Http\Controllers\RawatInap\RawatInapController;
use App\Http\Controllers\Kunjungan\KunjunganAdminController;
use App\Http\Controllers\LandingpageController;
use App\Models\Obat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/',[LandingpageController::class, 'index']);
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('checkRole:dokter,admin,pasien');
Route::get('/generate-pdf/{pasien}', [PasienController::class, 'generatePDF'])->name('generatePDF')->middleware('checkRole:dokter,admin');
Route::get('/home', function (){
                                return view('auth.login');
                              })->middleware('guest');
Route::resource('dokter', DokterController::class)->middleware('checkRole:dokter,admin');
Route::resource('pasien', PasienController::class)->middleware('checkRole:dokter,pasien,admin');
Route::get('/pasien/profile', [PasienController::class, 'profile'])->name('profile')->middleware('checkrole:admin,pasien');
Route::resource('admin', AdminController::class)->middleware('checkRole:admin');
Route::resource('perjanjian', PerjanjianController::class)->middleware('checkRole:pasien,admin');
Route::resource('obat', ObatController::class)->middleware('checkRole:dokter,admin');
Route::resource('admin-dokter', AdminDokterController::class)->middleware('checkRole:admin');
Route::resource('admin-pasien', AdminPasienController::class)->middleware('checkRole:admin');
Route::resource('pengumuman', PengumumanController::class)->middleware('checkRole:admin');
Route::resource('rawatinap', RawatInapController::class)->middleware('checkRole:admin');
Route::post('rawatinap/verif/{id}', [RawatInapController::class, 'verif'])->middleware('checkRole:admin');
Route::resource('kunjungan-admin', KunjunganAdminController::class)->middleware('checkRole:admin');

