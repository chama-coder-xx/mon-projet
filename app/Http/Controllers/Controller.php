<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class Controller
{
    protected function authHeaders(Request $request): array
    {
        return array_filter([
            'token' => $request->header('token'),
            'username' => $request->header('username'),
        ]);
    }
}

