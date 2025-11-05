<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaksosController;
use App\Http\Controllers\BankSampahController;
use App\Http\Controllers\JadwalRondaController;

Route::get('/jadwal-ronda', [JadwalRondaController::class, 'index']);
Route::post('/jadwal-ronda', [JadwalRondaController::class, 'store']);
Route::put('/jadwal-ronda/{jadwalRonda}', [JadwalRondaController::class, 'update']);
Route::delete('/jadwal-ronda/{jadwalRonda}', [JadwalRondaController::class, 'destroy']);

Route::get('/bank-sampah', [BankSampahController::class, 'index']);
Route::post('/bank-sampah', [BankSampahController::class, 'store']);
Route::put('/bank-sampah/{bankSampah}', [BankSampahController::class, 'update']);
Route::delete('/bank-sampah/{bankSampah}', [BankSampahController::class, 'destroy']);

Route::get('/baksos', [BaksosController::class, 'index']);
Route::post('/baksos', [BaksosController::class, 'store']);
Route::put('/baksos/{baksos}', [BaksosController::class, 'update']);
Route::delete('/baksos/{baksos}', [BaksosController::class, 'destroy']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
