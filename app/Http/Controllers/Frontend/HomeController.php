<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use App\Models\TodaysDeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $homeBanners = Cache::remember('homeBanners', 86400, function () {
            return Banner::where('status', 1)->get();
        });

        // Group by type
        $mainBanners = $homeBanners->where('type', 'main')->take(3);
        $middleBanners = $homeBanners->where('type', 'home_middle')->first();
        $bottomBanners = $homeBanners->where('type', 'home_bottom')->first();
        $todaysBanner = $homeBanners->where('type', 'todays_deal')->first();

        // Todays Deal
        $todaysDeals = Cache::remember('todaysDeals', 86400, function () {
            return TodaysDeal::where('status', 1)->with('product')->take(20)->latest()->get();
        });

        // Todays Deal
        $latestProducts = Cache::remember('latestProducts', 86400, function () {
            return Product::where('status', 'active')->select('id', 'name', 'image', 'price', 'slug', 'category_id')->take(21)->latest()->get();
        });

        return view('frontend.home.index', compact(
            'mainBanners',
            'middleBanners',
            'bottomBanners',
            'todaysBanner',
            'todaysDeals',
            'latestProducts',
        ));
    }

    public function quickView($id)
    {
        Log::info($id);
        $product = Product::with(['category', 'galleries', 'variations'])->findOrFail($id);

        return view('frontend.home.partials.quick_view_modal', compact('product'))->render();
    }
}