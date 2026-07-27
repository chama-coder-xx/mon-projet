<?php

namespace App\Services\Daribati;

class AuthService
{
    private DaribatiClient $client;

    public function __construct()
    {
        $this->client = DaribatiClient::for('compte_fiscal');
    }

    public function login(string $username, string $password)
    {
        return $this->client->post('/providers/login', [
            'username' => $username,
            'password' => $password,
        ]);
    }

    public function verifyOtp(string $idFiscal, string $username, string $code)
    {
        return $this->client->post('/providers/CheckAccessCode', query: [
            'idFiscal' => $idFiscal,
            'username' => $username,
            'code' => $code,
        ]);
    }
}
