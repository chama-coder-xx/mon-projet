<?php

namespace App\Services\Daribati;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class DaribatiClient
{
    private function __construct(private string $backendKey)
    {
    }

    public static function for(string $backendKey): self
    {
        return new self($backendKey);
    }

    public function get(string $path, array $query = [], array $headers = []): Response
    {
        return Http::withoutVerifying()
            ->withHeaders($headers)
            ->get($this->baseUrl() . $path, $query);
    }

    public function post(string $path, array $body = [], array $headers = [], array $query = [], bool $asForm = false): Response
    {
        $request = Http::withoutVerifying()->withHeaders($headers);

        if (!empty($query)) {
            $request = $request->withQueryParameters($query);
        }

        return $asForm
            ? $request->asForm()->post($this->baseUrl() . $path, $body)
            : $request->post($this->baseUrl() . $path, $body);
    }

    private function baseUrl(): string
    {
        return config("services.daribati.{$this->backendKey}");
    }
}
