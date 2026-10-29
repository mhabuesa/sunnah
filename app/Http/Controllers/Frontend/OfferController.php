<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index($slug)
    {
        $offer = Offer::where('slug', $slug)->firstOrFail();
        $products = $offer->products()->where('status', 'active')->paginate(21);
        $banner = Banner::where('type', 'product_banner')->where('status', 1)->first();
        return view('frontend.offer.index', compact('slug', 'offer', 'products', 'banner'));
    }
}