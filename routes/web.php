<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDokterController;
use App\Http\Controllers\Admin\AdminPasienController;
use App\Http\Controllers\Dokter\DokterController;
use App\Http\Controllers\Dokter\DokterProfileController;
use App\Http\Controllers\Obat\ObatController;
use App\Http\Controllers\Pasien\PasienController;
use App\Http\Controllers\Perjanjian\PerjanjianController;
use App\Http\Controllers\Pengumuman\PengumumanController;
use App\Http\Controllers\RawatInap\RawatInapController;
use App\Http\Controllers\Kunjungan\KunjunganController; 
use App\Http\Controllers\RekamMedis\RekamMedisController; 
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
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('checkRole:dokter,admin,pasien');
Route::get('/generate-pdf/{pasien}', [PasienController::class, 'generatePDF'])->name('generatePDF')->middleware('checkRole:dokter,admin');
Route::get('/home', function ()
{
  return view('auth.login');
})->middleware('guest');
Route::resource('pasien', PasienController::class)->middleware('checkRole:dokter,pasien,admin');
Route::get('/pasien-profile', [PasienController::class, 'profile'])->name('pasien.profile')->middleware('checkRole:admin,pasien');
Route::post('/profile-insert', [PasienController::class, 'profileInsert'])->name('pasien.profileInsert')->middleware('checkRole:admin,pasien');
Route::post('/profile-udpate/{id}', [PasienController::class, 'profileUpdate'])->name('pasien.profileUpdate')->middleware('checkRole:admin,pasien');
Route::get('/kunjungan-index', [PasienController::class, 'kunjungan'])->name('pasien.kunjungan')->middleware('checkRole:admin,pasien');
Route::get('/kunjungan-ambil-antrian', [PasienController::class, 'ambilAntrian'])->name('pasien.ambilAntrian')->middleware('checkRole:admin,pasien');
Route::post('/kunjungan-insert', [PasienController::class, 'kunjunganInsert'])->name('pasien.kunjunganInsert')->middleware('checkRole:admin,pasien');
Route::get('/cetak-antrian', [PasienController::class, 'cetakRiwayatKunjungan'])->name('pasien.cetakAntrian')->middleware('checkRole:admin,pasien');
Route::get('/riwayat-kunjungan', [PasienController::class, 'riwayatKunjungan'])->name('pasien.riwayatKunjungan')->middleware('checkRole:admin,pasien');
Route::get('/riwayat-rawat-inap', [PasienController::class, 'riwayatRawatInap'])->name('pasien.riwayatRawatInap')->middleware('checkRole:admin,pasien');
Route::get('/pasien-rekam-medis', [PasienController::class, 'rekamMedis'])->name('pasien.rekamMedis')->middleware('checkRole:admin,pasien');
Route::get('/kritik-saran', [PasienController::class, 'kritikSaran'])->name('pasien.kritikSaran')->middleware('checkRole:admin,pasien');
Route::post('/kritik-saran-insert', [PasienController::class, 'kritikSaranInsert'])->name('pasien.kritikSaranInsert')->middleware('checkRole:admin,pasien');
Route::resource('dokter', DokterController::class)->middleware('checkRole:dokter,admin');
Route::resource('dokter-profile', DokterProfileController::class)->middleware('checkRole:dokter');
Route::get('/pasien/profile', [PasienController::class, 'profile'])->name('profile')->middleware('checkrole:admin,pasien');
Route::resource('admin', AdminController::class)->middleware('checkRole:admin');
Route::resource('perjanjian', PerjanjianController::class)->middleware('checkRole:pasien,admin');
Route::resource('obat', ObatController::class)->middleware('checkRole:dokter,admin');
Route::resource('admin-dokter', AdminDokterController::class)->middleware('checkRole:admin,dokter');
Route::resource('admin-pasien', AdminPasienController::class)->middleware('checkRole:admin');
Route::resource('pengumuman', PengumumanController::class)->middleware('checkRole:admin');
Route::resource('rawatinap', RawatInapController::class)->middleware('checkRole:dokter,admin');
Route::post('rawatinap/verif/{id}', [RawatInapController::class, 'verif'])->middleware('checkRole:admin');
Route::resource('kunjungan', KunjunganController::class)->middleware('checkRole:dokter,admin');
Route::resource('/rekam-medis', RekamMedisController::class)->middleware('checkRole:pasien,dokter,admin');