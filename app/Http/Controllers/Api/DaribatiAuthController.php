<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DaribatiService;
use Illuminate\Http\Request;

class DaribatiAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $service = new DaribatiService();

        $result = $service->login(
            $request->username,
            $request->password
        );

        return response()->json($result);
    }
}