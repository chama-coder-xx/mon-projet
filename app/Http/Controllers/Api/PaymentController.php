<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Daribati\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(private PaymentService $service)
    {
    }

    public function payMultipleCb(Request $request)
    {
        $data = $request->validate([
            'idFiscal' => 'required',
            'rs' => 'required',
            'email' => 'required',
            'userID' => 'required',
            'idArticle' => 'required',
            'typeTitre' => 'required',
            'montantTotalApaye' => 'required',
            'references' => 'required|array',
        ]);

        $headers = array_merge($this->authHeaders($request), [
            'idArticle' => $data['idArticle'],
            'typeTitre' => $data['typeTitre'],
            'montantTotalApaye' => $data['montantTotalApaye'],
        ]);

        $response = $this->service->payMultipleCb(
            $data['idFiscal'],
            $data['rs'],
            $data['email'],
            $data['userID'],
            $data['references'],
            $headers
        );

        return response()->json($response->json(), $response->status());
    }
}
