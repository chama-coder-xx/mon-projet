<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Daribati\FinancialService;
use Illuminate\Http\Request;

class FinancialController extends Controller
{
    public function __construct(private FinancialService $service)
    {
    }

    public function recette(Request $request)
    {
        $data = $request->validate([
            'idFiscal' => 'required',
            'dateFrom' => 'required',
            'dateTo' => 'required',
            'operation' => 'required',
        ]);

        $response = $this->service->getRecette(
            $data['idFiscal'],
            $data['dateFrom'],
            $data['dateTo'],
            $data['operation'],
            $this->authHeaders($request)
        );

        return response()->json($response->json(), $response->status());
    }
}
