<?php

namespace App\Services;

use App\Models\DeliveryMethod;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class PathaoService
{
    protected $baseUrl;
    protected $config;

    public function __construct()
    {
        // Service modhye config fetch kora
        $deliveryMethod = DeliveryMethod::where('name', 'pathao')->firstOrFail();
        $this->config = $deliveryMethod->config;

        $this->baseUrl = $this->config['base_url'];
    }

    public function getAccessToken()
    {
        return Cache::remember('pathao_token_' . $this->config['client_id'], 3500, function () {
            $response = Http::post($this->baseUrl . '/aladdin/api/v1/issue-token', [
                'client_id' => $this->config['client_id'],
                'client_secret' => $this->config['client_secret'],
                'grant_type' => 'password',
                'username' => $this->config['username'],
                'password' => $this->config['password'],
            ]);

            $data = $response->json();

            if (!isset($data['access_token'])) {
                throw new \Exception('Pathao token failed');
            }

            return $data['access_token'];
        });
    }

    public function request($method, $endpoint, $data = [])
    {
        $token = $this->getAccessToken();

        $response = Http::withToken($token)
            ->acceptJson()
            ->$method($this->baseUrl . $endpoint, $data);

        if ($response->status() == 401) {
            Cache::forget('pathao_token_' . $this->config['client_id']);
            return $this->request($method, $endpoint, $data);
        }

        return $response->json();
    }

    public function createOrder($data)
    {
        return $this->request('post', '/aladdin/api/v1/orders', $data);
    }

    public function getCities()
    {
        $response = Http::withToken($this->getAccessToken())
            ->acceptJson()
            ->get($this->baseUrl . '/aladdin/api/v1/city-list');

        return $response->json(); // ✅ array hishabe return
    }

    public function getZones($city_id)
    {
        $token = $this->getAccessToken();
        if (!$token) {
            return ['error' => 'Failed to get access token'];
        }

        $response = Http::withHeaders([
            'Content-Type' => 'application/json; charset=UTF-8',
            'Authorization' => 'Bearer ' . $token,
        ])->get($this->baseUrl . '/aladdin/api/v1/cities/' . $city_id . '/zone-list', []);

        if ($response->successful()) {
            return $response->json();
        }

        return [
            'status' => $response->status(),
            'body' => $response->body(),
        ];
    }
    public function getAreas($zone_id)
    {
        $token = $this->getAccessToken();
        if (!$token) {
            return ['error' => 'Failed to get access token'];
        }

        $response = Http::withHeaders([
            'Content-Type' => 'application/json; charset=UTF-8',
            'Authorization' => 'Bearer ' . $token,
        ])->get($this->baseUrl . '/aladdin/api/v1/zones/' . $zone_id . '/area-list', []);

        if ($response->successful()) {
            return $response->json();
        }

        return [
            'status' => $response->status(),
            'body' => $response->body(),
        ];
    }
}