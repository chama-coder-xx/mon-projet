<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response()->json([
        'message' => 'API Laravel fonctionne'
    ]);
});

Route::post('/compte-fiscal/login', function (Request $request) {
    try {
        $response = Http::withoutVerifying()->send('POST', env('DARIBATI_BASE_URL') . '/providers/login', [
            'json' => [
                'username' => $request->input('username'),
                'password' => $request->input('password'),
            ],
        ]);

        return response()->json(
            $response->json(),
            $response->status()
        );

    } catch (\Exception $e) {
        return response()->json([
            'error' => true,
            'message' => $e->getMessage()
        ], 500);
    }
});

Route::post('/compte-fiscal/otp', function (Request $request) {
    try {
        $url = env('DARIBATI_BASE_URL') . '/providers/CheckAccessCode';

        $response = Http::withoutVerifying()->send('POST', $url, [
            'query' => [
                'idFiscal' => $request->input('idFiscal'),
                'username' => $request->input('username'),
                'code' => $request->input('code'),
            ],
        ]);

        return response()->json(
            $response->json(),
            $response->status()
        );

    } catch (\Exception $e) {
        return response()->json([
            'error' => true,
            'message' => $e->getMessage()
        ], 500);
    }
});
Route::get('/compte-fiscal/dashboard', function (Request $request) {
    try {
        $response = Http::withoutVerifying()->get(
            env('DARIBATI_BASE_URL') . '/providers/dashboard',
            [
                'idFiscal' => $request->query('idFiscal')
            ]
        );

        return response()->json(
            $response->json(),
            $response->status()
        );

    } catch (\Exception $e) {
        return response()->json([
            'error' => true,
            'message' => $e->getMessage()
        ], 500);
    }
});