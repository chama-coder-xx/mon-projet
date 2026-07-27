<?php

namespace App\Services\Daribati;

class AttestationService
{
    private DaribatiClient $client;

    public function __construct()
    {
        $this->client = DaribatiClient::for('attestation');
    }

    public function verifyTp(string $idFiscal, string $numTp, array $headers)
    {
        return $this->client->get('/verifieAttestationTP', ['idFiscal' => $idFiscal, 'numTP' => $numTp], $headers);
    }

    public function downloadTp(string $idFiscal, string $numTp, array $headers)
    {
        return $this->client->get('/attestationTP', ['idFiscal' => $idFiscal, 'numTP' => $numTp], $headers);
    }
}
