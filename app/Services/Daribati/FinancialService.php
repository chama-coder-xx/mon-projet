<?php

namespace App\Services\Daribati;

class FinancialService
{
    private DaribatiClient $client;

    public function __construct()
    {
        $this->client = DaribatiClient::for('compte_fiscal');
    }

    public function getRecette(string $idFiscal, string $dateFrom, string $dateTo, string $operation, array $headers)
    {
        return $this->client->get('/providers/recette', [
            'idFiscal' => $idFiscal,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
            'operation' => $operation,
        ], $headers);
    }
}
