<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\HomepageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PenindakanController;
use App\Http\Controllers\User\PelaporanController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\KeluhanController;
use App\Http\Controllers\Admin\ProyekController;

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
	return view('landing');
});

Route::middleware(['isPelanggan'])->group(function () {
    Route::get('/dashboard', [HomepageController::class, 'index'])->name('user.dashboard.index');

    Route::resource('pelaporan', PelaporanController::class);
    Route::post('getLaporan', [PelaporanController::class, 'getLaporan'])->name('Pelaporan.getLaporan');
    Route::get('laporan/cetak', [PelaporanController::class, 'cetakLaporan'])->name('Pelaporan.cetakLaporan');

    Route::get('/logout', [HomepageController::class, 'logout'])->name('pelukan.logout');

    Route::post('/store', [UserController::class, 'storeKeluhan'])->name('pelukan.store');
    Route::get('/laporan/{siapa?}', [UserController::class, 'laporan'])->name('pelukan.laporan');
    
});

Route::middleware(['guest'])->group(function () {
    //Login
    Route::post('/login/auth', [HomepageController::class, 'login'])->name('pelukan.login');
    
});

Route::prefix('admin')->group(function (){

    Route::middleware(['isAdmin'])->group(function () {  

        //Proyek
        Route::resource('proyek', ProyekController::class);
        
        //petugas
        Route::resource('petugas', PetugasController::class);

        
        //Pelanggan
        Route::resource('pelanggan', PelangganController::class);

        //Laporan
        Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::post('getLaporan', [LaporanController::class, 'getLaporan'])->name('laporan.getLaporan');
        Route::get('laporan/cetak/{from}/{to}', [LaporanController::class, 'cetakLaporan'])->name('laporan.cetakLaporan');

        Route::get('/logout', [AdminController::class, 'Logout'])->name('admin.logout');
    });

    Route::middleware(['isPetugas'])->group(function () {
        //Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');  

        //Keluhan
        Route::resource('keluhan', KeluhanController::class);
        
        //penindakan
        Route::post('penindakan/createOrUpdate', [PenindakanController::class, 'createOrUpdate'])->name('penindakan.createOrUpdate');
        
        //logout
        Route::get('/logout', [AdminController::class, 'Logout'])->name('admin.logout');
    });

    Route::middleware(['isGuest'])->group(function () {
        Route::get('/', [AdminController::class, 'formLogin'])->name('admin.formLogin');
        Route::post('/login', [AdminController::class, 'Login'])->name('admin.login');        
    });
    
});