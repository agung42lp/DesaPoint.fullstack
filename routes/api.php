<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankSampahController;
use App\Http\Controllers\JadwalRondaController;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\KebersihanController;
use App\Http\Controllers\DanaSosialController;

Route::get('/dana-sosial', [DanaSosialController::class, 'index']);
Route::post('/dana-sosial', [DanaSosialController::class, 'store']);
Route::put('/dana-sosial/{danaSosial}', [DanaSosialController::class, 'update']);
Route::delete('/dana-sosial/{danaSosial}', [DanaSosialController::class, 'destroy']);

Route::get('/kebersihan', [KebersihanController::class, 'index']);
Route::post('/kebersihan', [KebersihanController::class, 'store']);
Route::put('/kebersihan/{kebersihan}', [KebersihanController::class, 'update']);
Route::delete('/kebersihan/{kebersihan}', [KebersihanController::class, 'destroy']);

Route::get('/export/pengaduan', [PengaduanController::class, 'export']);
Route::get('/export/bank-sampah', [BankSampahController::class, 'export']);
Route::get('/export/jadwal-ronda', [JadwalRondaController::class, 'export']);
Route::get('/export/laporan-keuangan', [LaporanKeuanganController::class, 'export']);
Route::get('/export/dana-sosial', [DanaSosialController::class, 'export']);

Route::get('/pengaduan', [PengaduanController::class, 'index']);
Route::post('/pengaduan', [PengaduanController::class, 'store']);
Route::put('/pengaduan/{pengaduan}', [PengaduanController::class, 'update']);

Route::get('/laporan-keuangan', [LaporanKeuanganController::class, 'index']);
Route::post('/laporan-keuangan', [LaporanKeuanganController::class, 'store']);
Route::put('/laporan-keuangan/{laporanKeuangan}', [LaporanKeuanganController::class, 'update']);
Route::delete('/laporan-keuangan/{laporanKeuangan}', [LaporanKeuanganController::class, 'destroy']);

Route::get('/jadwal-ronda', [JadwalRondaController::class, 'index']);
Route::post('/jadwal-ronda', [JadwalRondaController::class, 'store']);
Route::put('/jadwal-ronda/{jadwalRonda}', [JadwalRondaController::class, 'update']);
Route::delete('/jadwal-ronda/{jadwalRonda}', [JadwalRondaController::class, 'destroy']);

Route::get('/bank-sampah', [BankSampahController::class, 'index']);
Route::post('/bank-sampah', [BankSampahController::class, 'store']);
Route::put('/bank-sampah/{bankSampah}', [BankSampahController::class, 'update']);
Route::delete('/bank-sampah/{bankSampah}', [BankSampahController::class, 'destroy']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
