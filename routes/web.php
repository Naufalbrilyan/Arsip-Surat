<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\MasyarakatController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\SuratController;
use App\Http\Controllers\Admin\PermohonanController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\User\EmailController;
use App\Http\Controllers\User\SocialController;
use App\Http\Controllers\User\UserController;
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

Route::get('/', [UserController::class, 'index'])->name('pekat.index');



Route::prefix('admin')->group(function () {

    Route::middleware(['isAdmin'])->group(function () {

        Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

        // Admin Kategori
        Route::resource('/admin/kategori', KategoriController::class);
    
        // Admin Surat
        Route::resource('/admin/surat', SuratController::class);
        // Petugas
        Route::resource('petugas', PetugasController::class);

        // Masyarakat
        Route::resource('masyarakat', MasyarakatController::class);
        Route::get('/unduh-arsip/{id}', [SuratController::class, 'unduhArsip'])->name('unduh-arsip');

        // Laporan
        Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::post('getLaporan', [LaporanController::class, 'getLaporan'])->name('laporan.getLaporan');
        Route::get('laporan/cetak/{from}/{to}', [LaporanController::class, 'cetakLaporan'])->name('laporan.cetakLaporan');
    });

    Route::middleware(['isPetugas'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        
        Route::resource('permohonan', PermohonanController::class);

        Route::get('/permohonan/kelola/{id_permohonan}', [PermohonanController::class, 'kelola'])
        ->name('permohonan.kelola');



        // Taanggapan
        Route::post('tanggapan/createOrUpdate', [TanggapanController::class, 'createOrUpdate'])->name('tanggapan.createOrUpdate');

        // Logout
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });

    Route::middleware(['isGuest'])->group(function () {
        Route::get('/', [AdminController::class, 'formLogin'])->name('admin.formLogin');
        Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    });
});

