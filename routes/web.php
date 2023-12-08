<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TRXController;
use App\Http\Controllers\MasterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();
Route::get('/', [HomeController::class, 'index']);
Route::get('Form/Transaksi', [TRXController::class, 'form']);
Route::get('Form=edit/{id}/Transaksi', [TRXController::class, 'form_patch']);
    // Pasien
        Route::get('/Pasien', [MasterController::class, 'idx_pasien']);
        Route::POST('Add/Pasien', [MasterController::class, 'store_ps']);
        Route::PATCH('Edt/Pasien/{id}', [MasterController::class, 'updt_ps']);
        Route::PATCH('Dstr/Pasien/{id}', [MasterController::class, 'dstr_ps']);
    // Dokter
        Route::get('/Dokter', [MasterController::class, 'idx_dokter']);
        Route::POST('Add/Dokter', [MasterController::class, 'store_dr']);
        Route::PATCH('Edt/Dokter/{id}', [MasterController::class, 'updt_dr']);
        Route::PATCH('Dstr/Dokter/{id}', [MasterController::class, 'dstr_dr']);
    // Tindakan
        Route::get('/Tindakan', [MasterController::class, 'idx_tindakan']);
        Route::POST('Add/Tindakan', [MasterController::class, 'store_td']);
        Route::PATCH('Edt/Tindakan/{id}', [MasterController::class, 'updt_td']);
        Route::PATCH('Dstr/Tindakan/{id}', [MasterController::class, 'dstr_td']);
// TRX
Route::POST('Tambah/Transaksi', [TRXController::class, 'procs']);
Route::PATCH('Update/{id_trx}/Transaksi', [TRXController::class, 'updateData']);
Route::DELETE('Delete/{id_trx}/Transaksi', [TRXController::class, 'delete_trx']);