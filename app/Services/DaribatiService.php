<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DaribatiService
{
    public function login($username, $password)
    {
        $baseUrl = env('DARIBATI_BASE_URL');

        $response = Http::post($baseUrl . '/providers/login', [
            'username' => $username,
            'password' => $password,
        ]);

        return $response->json();
    }
}