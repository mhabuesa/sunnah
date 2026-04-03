<?php

namespace App\Services;

use App\Models\DeliveryMethod;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RedxService
{
    protected $token;
    protected $baseUrl;

    public function __construct()
    {
        $deliveryMethod = DeliveryMethod::where('name', 'redx')->first();
        $config = $deliveryMethod->config;
        $this->token = $config['token'] ?? '';
        $this->baseUrl = $config['base_url'];
    }

    public function createOrder(array $data)
    {
        $response = Http::withHeaders([
            'API-ACCESS-TOKEN' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
        ])->post($this->baseUrl . '/parcel', $data);

        if ($response->failed()) {
            Log::error('Redx API Error: ' . $response->body());
        }
        return $response->json();
    }

    public function getAreas()
    {
        $response = Http::withHeaders([
            'API-ACCESS-TOKEN' => 'Bearer ' . $this->token,
        ])->get($this->baseUrl . '/areas');
        
        if ($response->successful()) {
            return $response->json();
        }

        Log::error('Redx Area Error: ' . $response->body());
        return [];
    }
}