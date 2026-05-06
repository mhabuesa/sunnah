<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function index()
    {
        $token = "eyJhbGciOiJIUzI1NiJ9.eyJleHAiOjE3Nzc5ODEzNjcsInVzZXJfaWQiOjcyNzk5MiwidWlkIjoiOTE2MmE2MTAtMzQwNy00OGRkLTkzYjEtZjQyMWI4M2EzYWZlIiwicnVpZCI6ImI2MTVjYjdmLWIwYWItNDQ0Ni1iOTk4LTg4ODJlMWE4NjkxYiJ9.wfzRWZEigJ17UsTwBozgT6VU2z1Sude7Z74H_8y3S4a";

        $response = Http::withToken($token)
            ->get('https://svp-international-api.pacc.sa/api/v1/individual_labor_space/exam_sessions/available_dates', [
                'per_page' => 59,
                'category_id' => 59,
                'start_at_date_from' => '2026-05-05',
                'available_seats' => 'greater_than::0',
                'status' => 'scheduled',
                'locale' => 'en'
            ]);

        return $response->json();
    }
}