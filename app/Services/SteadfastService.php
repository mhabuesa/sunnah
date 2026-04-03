<?php

namespace App\Services;

use App\Models\DeliveryMethod;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SteadfastService
{
    protected $apiKey;
    protected $secretKey;
    protected $baseUrl;

    public function __construct()
    {
        $deliveryMethod = DeliveryMethod::where('name', 'steadfast')->first();

        $config = $deliveryMethod->config;

        $this->apiKey = $config['api_key'] ?? '';
        $this->secretKey = $config['secret_key'] ?? '';
        $this->baseUrl = $config['base_url'];
    }

    // 📦 Create Order
    public function createOrder(array $data)
    {
        $response = Http::withHeaders([
            'Api-Key' => $this->apiKey,
            'Secret-Key' => $this->secretKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post($this->baseUrl . '/create_order', $data);

        if ($response->failed()) {
            Log::error('Steadfast API Error: ' . $response->body());
        }

        dd($response->json());
        return $response->json();
    }
}