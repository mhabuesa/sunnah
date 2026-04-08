<?php

namespace App\Services;

use App\Jobs\PromotionalSmsJob;
use App\Jobs\SendSmsJob;
use App\Models\SmsConfig;
use Illuminate\Support\Facades\Http;

class SmsService
{
    protected $smsConfig;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->smsConfig = SmsConfig::first();
    }

    public function sendMessage(array $data)
    {
        SendSmsJob::dispatch($data);
    }

    public function getBalance()
    {
        $response = Http::get('http://bulksmsbd.net/api/getBalanceApi', [
            'api_key' =>  $this->smsConfig->api_key,
        ]);

        return $response->json();
    }
}