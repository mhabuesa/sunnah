<?php

namespace App\Http\Controllers;

use App\Traits\FraudCheckerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    use FraudCheckerTrait;
    public function dashboard()
    {
        return view("backend.index");
    }


    public function fraudCheck()
    {
        $data = $this->checkFraud('01712803497');
        dd($data);
    }
    public function CheckBalance()
    {
        $token = 'oat_MzM1.bElLN1ZWWkVLS2RiemlRRDBwSGVxRFdaYTFpN2M0dHBoR3dNU2drdDE4NTEyNDkyMjk';

        // ১. ব্যালেন্স চেক (এটি ঠিক আছে)
        $responseBalance = Http::withToken($token)
            ->withHeaders(['Accept' => 'application/json'])
            ->get('https://api.awajdigital.com/api/balance');

        // ২. সার্ভে কল (সংশোধিত)
        $url = 'https://api.awajdigital.com/api/surveys';
        $data = [
            'request_id'    => (string) Str::random(20), // ইউনিক আইডি
            'template_name' => 'survey_call',           // নিশ্চিত হোন এটি Published কি না
            'sender'        => '8809606990198',         // ৮৮০ যোগ করে দেখুন
            'phone_numbers' => ['01706944396'],         // ১১ ডিজিট (ঠিক আছে)
            'metadata'      => ['campaign_id' => 'summer2025'],
            'webhook_url'   => 'https://example.com/webhook'
        ];

        $responseSurvey = Http::withToken($token)
            ->withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])
            ->post($url, $data);

        dd([
            'balance' => $responseBalance->json(),
            'survey'  => $responseSurvey->json(),
            'sent_data' => $data // কি ডাটা পাঠাচ্ছেন তা দেখার জন্য
        ]);
    }
}