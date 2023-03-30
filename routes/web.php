<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TanggapanController;
use App\Models\masyarakat;
use Illuminate\Foundation\Auth\User;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome')->name('welcome');
});

Route::get('/register', [LoginController::class, 'showRegisterMasyarakat'])->name('register');
Route::post('/register', [LoginController::class, 'registerMasyarakat']);

Route::get('/login', [LoginController::class, 'showLoginMasyarakat'])->name('login');
Route::post('/login', [LoginController::class, 'loginMasyarakat']);

Route::get('/petugas/login', [LoginController::class, 'showLoginPetugas'])->name('petugas.login');
Route::post('/petugas/auth/login', [LoginController::class, 'loginPetugas'])->name('auth.petugas ');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//masyarakat
Route::middleware('isMasyarakat')->group(function () {

    Route::get('/masyarakat/dashboard', [MasyarakatController::class, 'dashboard'])->name('masyarakat.dashboard');
    Route::get('/masyarakat/complain', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/masyarakat/create', [PengaduanController::class, 'create']);
    Route::post('/masyarakat', [PengaduanController::class, 'store']);
    Route::get('/masyarakat/pengaduan/edit/{id}', [PengaduanController::class, 'edit']);
    Route::post('/masyarakat/pengaduan/update/{id}', [PengaduanController::class, 'update'])->name('pengaduan.update');
});

Route::middleware('isPetugasAdmin')->group(function () {

    Route::get('/petugas/dashboard', [PetugasController::class, 'dashboard'])->name('petugas.dashboard');
    Route::get('/petugas/daftar-pengaduan', [PengaduanController::class, 'getListComplains']);
    Route::get('/petugas/daftar-tanggapan', [TanggapanController::class, 'index'])->name('tanggapan');
    Route::get('/petugas/tanggapan/create/{id_pengaduan}', [TanggapanController::class, 'createTanggapan'])->name('petugas.tanggapan');
    Route::post('/petugas/tanggapan/store/{id_pengaduan}', [TanggapanController::class, 'storeTanggapan'])->name('tanggapan.store');
    Route::get('/petugas/tanggapan/delete/{id}', [TanggapanController::class, 'deleteTanggapan'])->name('tanggapan.delete');
    Route::get('/petugas/tanggapan/edit/{id}', [TanggapanController::class, 'editTanggapan']);
    Route::post('/petugas/tanggapan/update/{id}', [TanggapanController::class, 'updateTanggapan'])->name('tanggapan.update');
    Route::get('/petugas/pengaduan-selesai', [PengaduanController::class, 'getComplainsFinish']);
    Route::get('/petugas/pengaduan-proses', [PengaduanController::class, 'getComplainsProses']);
    // Route::get('/masyarakat/pengaduan/delete/{id}', [PengaduanController::class, 'delete']);
    
});

//petugas

Route::middleware('isAdmin')->group(function () {

    Route::get('/petugas/petugas', [PetugasController::class, 'akunPetugas'])->name('petugas.petugas');
    Route::get('/petugas/masyarakat', [PetugasController::class, 'getAkunMasyarakat'])->name('petugas.masyarakat');
    Route::get('/petugas/masyarakat/delete/{id}', [PetugasController::class, 'deleteAkunMasyarakat']);
    Route::get('/petugas/petugas/create', [PetugasController::class, 'createPetugas'])->name('petugas.create');
    Route::post('/petugas/petugas/store', [PetugasController::class, 'storePetugas'])->name('petugas.store');
    Route::get('/petugas/petugas/delete/{id}', [PetugasController::class, 'deletePetugas']);
    Route::get('/petugas/petugas/edit/{id}', [PetugasController::class, 'editPetugas']);
    Route::post('/petugas/petugas/update/{id}', [PetugasController::class, 'updatePetugas'])->name('petugas.update');
    
    Route::get('/petugas/tanggapan/generate-pdf', [PetugasController::class, 'generatePDF'])->name('generate');
    Route::get('/petugas/pengaduan-selesai/generate-pdf', [PetugasController::class, 'generatePDFSelesai'])->name('generate.PS');
    Route::get('/petugas/pengaduan-proses/generate-pdf', [PetugasController::class, 'generatePDFProses'])->name('generate.PP');
});


