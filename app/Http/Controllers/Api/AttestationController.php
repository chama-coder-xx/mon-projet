<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Daribati\AttestationService;
use Illuminate\Http\Request;

class AttestationController extends Controller
{
    public function __construct(private AttestationService $service)
    {
    }

    public function verifyTp(Request $request)
    {
        $data = $request->validate(['idFiscal' => 'required', 'numTP' => 'required']);

        $response = $this->service->verifyTp($data['idFiscal'], $data['numTP'], $this->authHeaders($request));

        return response()->json($response->json(), $response->status());
    }

    public function downloadTp(Request $request)
    {
        $data = $request->validate(['idFiscal' => 'required', 'numTP' => 'required']);

        $response = $this->service->downloadTp($data['idFiscal'], $data['numTP'], $this->authHeaders($request));

        return response()->json($response->json(), $response->status());
    }

    public function verifyBulletinIf(Request $request)
    {
        $data = $request->validate(['idFiscal' => 'required']);

        $response = $this->service->verifyBulletinIf($data['idFiscal'], $this->authHeaders($request));

        return response()->json($response->json(), $response->status());
    }

    public function downloadBulletinIf(Request $request)
    {
        $data = $request->validate(['idFiscal' => 'required']);

        $response = $this->service->downloadBulletinIf($data['idFiscal'], $this->authHeaders($request));

        return response()->json($response->json(), $response->status());
    }

    public function verifyRevenu(Request $request)
    {
        $data = $request->validate(['idFiscal' => 'required', 'exercices' => 'required']);

        $response = $this->service->verifyRevenu($data['idFiscal'], $data['exercices'], $this->authHeaders($request));

        return response()->json($response->json(), $response->status());
    }

    public function downloadRevenu(Request $request)
    {
        $data = $request->validate(['idFiscal' => 'required', 'exercices' => 'required']);

        $response = $this->service->downloadRevenu($data['idFiscal'], $data['exercices'], $this->authHeaders($request));

        return response()->json($response->json(), $response->status());
    }

    public function verifyPublic(Request $request)
    {
        $data = $request->validate([
            'idFiscal' => 'required',
            'typeAttestation' => 'required',
            'annee' => 'required',
            'codeVerif' => 'required',
        ]);

        $response = $this->service->verifyPublic(
            $data['idFiscal'],
            $data['typeAttestation'],
            $data['annee'],
            $data['codeVerif'],
            $this->authHeaders($request)
        );

        return response()->json($response->json(), $response->status());
    }

    public function requestCae(Request $request)
    {
        $data = $request->validate(['idFiscal' => 'required', 'exercices' => 'required']);

        $response = $this->service->requestCae($data['idFiscal'], $data['exercices'], $this->authHeaders($request));

        return response()->json($response->json(), $response->status());
    }

    public function downloadPdf(Request $request)
    {
        $data = $request->validate(['pdfID' => 'required', 'idFiscal' => 'required']);

        $response = $this->service->downloadPdf($data['pdfID'], $data['idFiscal'], $this->authHeaders($request));

        return response()->json($response->json(), $response->status());
    }

    public function verifyCa(Request $request)
    {
        $data = $request->validate(['idFiscal' => 'required', 'exercices' => 'required']);

        $response = $this->service->verifyCa($data['idFiscal'], $data['exercices'], $this->authHeaders($request));

        return response()->json($response->json(), $response->status());
    }

    public function downloadCa(Request $request)
    {
        $data = $request->validate(['idFiscal' => 'required', 'exercices' => 'required']);

        $response = $this->service->downloadCa($data['idFiscal'], $data['exercices'], $this->authHeaders($request));

        return response()->json($response->json(), $response->status());
    }

    public function radiation(Request $request)
    {
        $data = $request->validate(['idFiscal' => 'required', 'numTp' => 'required']);

        $response = $this->service->radiation($data['idFiscal'], $data['numTp'], $this->authHeaders($request));

        return response()->json($response->json(), $response->status());
    }
}
