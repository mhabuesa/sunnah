<?php

namespace App\Services;

use App\Models\DeliveryMethod;
use Illuminate\Support\Facades\Http;

class SteadfastService
{
    protected $apiKey;
    protected $secretKey;
    protected $baseUrl;
    protected $config;

    public function __construct()
    {
        // Service modhye config fetch kora
        $deliveryMethod = DeliveryMethod::where('name', 'steadfast')->firstOrFail();
        $this->config = $deliveryMethod->config;

        $this->apiKey = $this->config['api_key'];
        $this->secretKey = $this->config['secret_key'];
        $this->baseUrl = $this->config['base_url'];
    }

    // 📦 Create Order
    public function createOrder($data)
    {

        $response = Http::withHeaders([
            'Api-Key' => $this->apiKey,
            'Secret-Key' => $this->secretKey,
            'Content-Type' => 'application/json',
        ])->post($this->baseUrl . '/create_order', $data);

        return $response->json();
    }
}