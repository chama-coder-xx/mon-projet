<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Daribati\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(private DashboardService $service)
    {
    }

    public function show(Request $request)
    {
        $data = $request->validate(['idFiscal' => 'required']);

        $response = $this->service->getDashboard($data['idFiscal'], $this->authHeaders($request));

        return response()->json($response->json(), $response->status());
    }

    public function initPaymentMultiple(Request $request)
    {
        $data = $request->validate(['idFiscal' => 'required']);

        $response = $this->service->getInitPaymentMultiple($data['idFiscal'], $this->authHeaders($request));

        return response()->json($response->json(), $response->status());
    }
}
