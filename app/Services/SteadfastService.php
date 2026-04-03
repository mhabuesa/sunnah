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
        // Settings database theke nite ekti default ba try-catch use kora bhalo
        $deliveryMethod = DeliveryMethod::where('name', 'steadfast')->first();

        if (!$deliveryMethod) {
            throw new \Exception("Steadfast delivery method not configured in database.");
        }

        $config = $deliveryMethod->config;

        $this->apiKey = $config['api_key'] ?? '';
        $this->secretKey = $config['secret_key'] ?? '';
        $this->baseUrl = rtrim($config['base_url'], '/'); // Shesh-er slash remove korbe
    }

    // 📦 Create Order
    public function createOrder(array $data)
    {
        try {
            $response = Http::withHeaders([
                'Api-Key' => $this->apiKey,
                'Secret-Key' => $this->secretKey,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post($this->baseUrl . '/create_order', $data);

            if ($response->failed()) {
                Log::error('Steadfast API Error: ' . $response->body());
            }

            return $response->json();
        } catch (\Exception $e) {
            Log::error('Steadfast Service Exception: ' . $e->getMessage());
            return ['status' => 500, 'message' => 'Internal Server Error'];
        }
    }
}