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
}
