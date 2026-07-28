<?php

use App\Http\Controllers\Api\AttestationController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\DeclarationController;
use App\Http\Controllers\Api\FinancialController;
use App\Http\Controllers\Api\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response()->json([
        'message' => 'API Laravel fonctionne'
    ]);
});

Route::post('/compte-fiscal/login', [AuthController::class, 'login']);
Route::post('/compte-fiscal/otp', [AuthController::class, 'otp']);
Route::get('/compte-fiscal/dashboard', [DashboardController::class, 'show']);
Route::get('/compte-fiscal/init-payment-multiple', [DashboardController::class, 'initPaymentMultiple']);
Route::get('/compte-fiscal/declarations/search', [DeclarationController::class, 'search']);
Route::post('/compte-fiscal/payments/multiple-cb', [PaymentController::class, 'payMultipleCb']);
Route::get('/compte-fiscal/recette', [FinancialController::class, 'recette']);

Route::prefix('attestations')->controller(AttestationController::class)->group(function () {
    Route::get('/tp/verify', 'verifyTp');
    Route::get('/tp/download', 'downloadTp');
    Route::get('/bulletin-if/verify', 'verifyBulletinIf');
    Route::get('/bulletin-if/download', 'downloadBulletinIf');
    Route::get('/revenu/verify', 'verifyRevenu');
    Route::get('/revenu/download', 'downloadRevenu');
    Route::get('/public/verify', 'verifyPublic');
    Route::get('/cae/request', 'requestCae');
    Route::get('/pdf/download', 'downloadPdf');
    Route::get('/ca/verify', 'verifyCa');
    Route::get('/ca/download', 'downloadCa');
    Route::get('/radiation', 'radiation');
});