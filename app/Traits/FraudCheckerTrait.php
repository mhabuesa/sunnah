<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

trait FraudCheckerTrait
{
     private function checkFraud($phone): array
    {

        // Step 1: CSRF token + cookies
        $page = Http::get('https://elitemart.com.bd/fraud-check');

        preg_match('/name="_token" value="(.*?)"/', $page->body(), $matches);
        $token = $matches[1] ?? '';

        $cookies = collect($page->cookies()->toArray())
            ->mapWithKeys(fn ($c) => [$c['Name'] => $c['Value']])
            ->toArray();

        // Step 2: POST request
        $response = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0',
            'Referer' => 'https://elitemart.com.bd/fraud-check',
        ])
        ->withCookies($cookies, 'elitemart.com.bd')
        ->asForm()
        ->post('https://elitemart.com.bd/fraud-check', [
            '_token' => $token,
            'phone' => $phone
        ]);

        $html = $response->body();
        $crawler = new Crawler($html);

        // =============================
        // SUMMARY DATA
        // =============================

        try {

            $totalOrders = (int) $crawler->filter('.text-info')->first()->text();
            $delivered   = (int) $crawler->filter('.text-success')->first()->text();
            $cancelled   = (int) $crawler->filter('.text-danger')->first()->text();

            // success rate comes from attribute
            $successRate = $crawler
                ->filter('.circular-progress')
                ->attr('data-percentage');

        } catch (\Exception $e) {

            $totalOrders = 0;
            $delivered   = 0;
            $cancelled   = 0;
            $successRate = '0%';

        }

        // =============================
        // COURIER TABLE
        // =============================

        $couriers = [];

        $crawler->filter('.courier_table tbody tr')->each(function (Crawler $node) use (&$couriers) {

            $cells = $node->filter('td');

            if ($cells->count() >= 5) {

                $couriers[] = [
                    'name'      => trim($cells->eq(0)->text()),
                    'orders'    => (int) trim($cells->eq(1)->text()),
                    'delivered' => (int) trim($cells->eq(2)->text()),
                    'cancelled' => (int) trim($cells->eq(3)->text()),
                    'rate'      => trim($cells->eq(4)->text()) === 'N/A'
                                    ? null
                                    : trim($cells->eq(4)->text()),
                ];
            }

        });

        // =============================
        // RISK CALCULATION
        // =============================

        $rateInt = (int) str_replace('%', '', $successRate);

        if ($totalOrders == 0) {
            $risk = 'new';
        } elseif ($rateInt <= 25) {
            $risk = 'high';
        } elseif ($rateInt <= 50) {
            $risk = 'medium';
        } elseif ($rateInt <= 75) {
            $risk = 'low';
        } else {
            $risk = 'safe';
        }

        // =============================
        // FINAL RESPONSE
        // =============================

        $finalData = [
            'phone' => $phone,
            'summary' => [
                'total_orders' => $totalOrders,
                'delivered'    => $delivered,
                'cancelled'    => $cancelled,
                'success_rate' => $successRate,
                'risk'         => $risk
            ],
            'couriers' => $couriers
        ];

        // return response()->json($finalData, 200, [], JSON_PRETTY_PRINT);
        // return json_encode($finalData, JSON_PRETTY_PRINT);
        return $finalData;

    
    }
}