<?php

namespace App\Services\Daribati;

class PaymentService
{
    private DaribatiClient $client;

    public function __construct()
    {
        $this->client = DaribatiClient::for('compte_fiscal');
    }

    public function payMultipleCb(string $idFiscal, string $rs, string $email, string $userId, array $references, array $headers)
    {
        return $this->client->post('/providers/paiementMultipleCB', $references, $headers, [
            'idFiscal' => $idFiscal,
            'rs' => $rs,
            'email' => $email,
            'userID' => $userId,
        ]);
    }
}
