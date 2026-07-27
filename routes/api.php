<?php

use App\Http\Controllers\Api\AttestationController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response()->json([
        'message' => 'API Laravel fonctionne'
    ]);
});

Route::post('/compte-fiscal/login', [AuthController::class, 'login']);
Route::post('/compte-fiscal/otp', [AuthController::class, 'otp']);
Route::get('/compte-fiscal/dashboard', [DashboardController::class, 'show']);

Route::prefix('attestations')->controller(AttestationController::class)->group(function () {
    Route::get('/tp/verify', 'verifyTp');
    Route::get('/tp/download', 'downloadTp');
});