<?php

namespace App\Services\Daribati;

class DeclarationService
{
    private DaribatiClient $client;

    public function __construct()
    {
        $this->client = DaribatiClient::for('compte_fiscal');
    }

    public function search(string $idFiscal, string $dateFrom, string $dateTo, string $typeImpot, array $headers)
    {
        return $this->client->get('/providers/declarationsearch', [
            'idFiscal' => $idFiscal,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
            'typeImpot' => $typeImpot,
        ], $headers);
    }
}
