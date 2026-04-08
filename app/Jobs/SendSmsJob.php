<?php

namespace App\Jobs;

use App\Models\SmsConfig;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendSmsJob implements ShouldQueue
{
    use Queueable;

    protected $data;
    protected $smsConfig;

    public function __construct($data)
    {
        $this->data = $data;
        $this->smsConfig = SmsConfig::first();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Message
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = $this->smsConfig->api_key;
        $senderid = $this->smsConfig->sender_id;
        $number = $this->data['number'];
        $message = $this->data['message'];

        $postData = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $number,
            "message" => $message
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
    }
}