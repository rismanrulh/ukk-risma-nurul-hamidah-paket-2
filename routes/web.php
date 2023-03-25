<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanController;
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
Route::post('/petugas/login', [LoginController::class, 'loginPetugas'])->name('auth.petugas ');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//masyarakat
Route::get('/masyarakat/dashboard', [MasyarakatController::class, 'dashboard'])->name('masyarakat.dashboard');
Route::get('/masyarakat/complain', [PengaduanController::class, 'index'])->name('pengaduan.index');
Route::get('/masyarakat/create', [PengaduanController::class, 'create']);
Route::post('/masyarakat', [PengaduanController::class, 'store']);
Route::get('/masyarakat/pengaduan/{id}', [PengaduanController::class, 'delete']);
