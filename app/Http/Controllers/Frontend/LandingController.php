<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function landing(string $slug)
    {
        $campaign = Campaign::where('campaign_url', $slug)->firstOrFail();

        return view('frontend.landing.mango', compact('campaign'));
    }
}