<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SteadfastService
{
    protected $apiKey;
    protected $secretKey;
    protected $baseUrl;

    public function __construct($config)
    {
        $this->apiKey = $config['api_key'];
        $this->secretKey = $config['secret_key'];
        $this->baseUrl = $config['base_url'];
    }

    protected function client()
    {
        return Http::withHeaders([
            'Api-Key' => $this->apiKey,
            'Secret-Key' => $this->secretKey,
            'Content-Type' => 'application/json'
        ]);
    }

    // 📦 Create Order
    public function createOrder($data)
    {
        // $response = $this->client()
        //     ->post($this->baseUrl . '/create_order', $data);

        // dd([
        //     'data_sent' => $data,
        //     'status' => $response->status(),
        //     'body' => $response->body(),
        // ]);

        $response = $this->client()->post($this->baseUrl . '/create_order', $data);

        dd([
            'sent' => $data,
            'status' => $response->status(),
            'body' => substr($response->body(), 0, 500), // limit
        ]);


        // return $this->client()->post($this->baseUrl . '/create_order', $data)->json();
    }

    // 🔍 Track Order
    public function trackOrder($trackingCode)
    {
        return $this->client()->get($this->baseUrl . '/status_by_cid/' . $trackingCode)->json();
    }
}