<?php

namespace App\Services\Daribati;

class DashboardService
{
    private DaribatiClient $client;

    public function __construct()
    {
        $this->client = DaribatiClient::for('compte_fiscal');
    }

    public function getDashboard(string $idFiscal, array $headers)
    {
        return $this->client->get('/providers/dashboard', ['idFiscal' => $idFiscal], $headers);
    }
}
