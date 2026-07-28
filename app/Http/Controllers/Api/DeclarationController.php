<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Daribati\DeclarationService;
use Illuminate\Http\Request;

class DeclarationController extends Controller
{
    public function __construct(private DeclarationService $service)
    {
    }

    public function search(Request $request)
    {
        $data = $request->validate([
            'idFiscal' => 'required',
            'dateFrom' => 'required',
            'dateTo' => 'required',
            'typeImpot' => 'nullable',
        ]);

        $response = $this->service->search(
            $data['idFiscal'],
            $data['dateFrom'],
            $data['dateTo'],
            $data['typeImpot'] ?? '',
            $this->authHeaders($request)
        );

        return response()->json($response->json(), $response->status());
    }
}
