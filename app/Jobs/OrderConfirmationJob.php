<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class OrderConfirmationJob implements ShouldQueue
{
    use Queueable;
    
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle(): void
    {
        // $data সরাসরি হবে না, $this->data ব্যবহার করতে হবে
        $orderData = $this->data;
        Log::info($orderData);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('api.awaj.api_token'), // config path check করুন
            'Accept' => 'application/json',
        ])->post('https://api.awajdigital.com/api/surveys', [
            'request_id'    => (string) Str::uuid(),
            'template_name' => 'Sunnah Shop', 
            'sender'        => '09606990198',
            'phone_numbers' => [$orderData['phone']],
            'metadata'      => [
                'order_id' => $orderData['order_id'],
                'secret'   => config('api.awaj.webhook_secret') 
            ],
            'webhook_url'   => "https://example.com/webhook",
        ]);

        if ($response->failed()) {
            Log::error('AwajDigital API Failed: ' . $response);
        }
    }
}