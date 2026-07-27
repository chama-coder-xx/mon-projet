<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Daribati\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private AuthService $service)
    {
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $response = $this->service->login($data['username'], $data['password']);

        return response()->json($response->json(), $response->status());
    }

    public function otp(Request $request)
    {
        $data = $request->validate([
            'idFiscal' => 'required',
            'username' => 'required',
            'code' => 'required',
        ]);

        $response = $this->service->verifyOtp($data['idFiscal'], $data['username'], $data['code']);

        return response()->json($response->json(), $response->status());
    }
}
