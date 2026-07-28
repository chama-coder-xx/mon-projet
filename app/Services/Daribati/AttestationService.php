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

    public function verifyBulletinIf(string $idFiscal, array $headers)
    {
        return $this->client->get('/verifieAttestationBulletin', ['idFiscal' => $idFiscal], $headers);
    }

    public function downloadBulletinIf(string $idFiscal, array $headers)
    {
        return $this->client->get('/bulletinIF', ['idFiscal' => $idFiscal], $headers);
    }

    public function verifyRevenu(string $idFiscal, string $exercices, array $headers)
    {
        return $this->client->get('/verifieAttestationRevenu', ['idFiscal' => $idFiscal, 'exercices' => $exercices], $headers);
    }

    public function downloadRevenu(string $idFiscal, string $exercices, array $headers)
    {
        return $this->client->get('/revenu', ['idFiscal' => $idFiscal, 'exercices' => $exercices], $headers);
    }

    public function verifyPublic(string $idFiscal, string $typeAttestation, string $annee, string $codeVerif, array $headers)
    {
        return $this->client->get('/verifieAttestations', [
            'idFiscal' => $idFiscal,
            'typeAttestation' => $typeAttestation,
            'annee' => $annee,
            'codeVerif' => $codeVerif,
        ], $headers);
    }

    public function requestCae(string $idFiscal, string $exercices, array $headers)
    {
        return $this->client->get('/demandeAttestationCAE', ['idFiscal' => $idFiscal, 'exercices' => $exercices], $headers);
    }

    public function downloadPdf(string $pdfId, string $idFiscal, array $headers)
    {
        return $this->client->get('/downloadAttestationPDF', ['pdfID' => $pdfId, 'idFiscal' => $idFiscal], $headers);
    }

    public function verifyCa(string $idFiscal, string $exercices, array $headers)
    {
        return $this->client->get('/verifieAttestationCA', ['idFiscal' => $idFiscal, 'exercices' => $exercices], $headers);
    }

    public function downloadCa(string $idFiscal, string $exercices, array $headers)
    {
        return $this->client->get('/chiffreAffaire', ['idFiscal' => $idFiscal, 'exercices' => $exercices], $headers);
    }

    public function radiation(string $idFiscal, string $numTp, array $headers)
    {
        return $this->client->get('/radiation', ['idFiscal' => $idFiscal, 'numTp' => $numTp], $headers);
    }
}
