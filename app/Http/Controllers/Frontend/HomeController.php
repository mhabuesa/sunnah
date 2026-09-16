<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
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
        $mainBanner = $homeBanners->where('type', 'main')->first();
        $topBanner = $homeBanners->where('type', 'home_top')->first();
        $middleBanner = $homeBanners->where('type', 'home_middle')->first();
        $bottomBanner = $homeBanners->where('type', 'home_bottom')->first();

        // Todays Deal
        $todaysDeals = Cache::remember('todaysDeals', 86400, function () {
            return TodaysDeal::where('status', 1)->with('product')->take(20)->latest()->get();
        });

        // Todays Deal
        $latestProducts = Cache::remember('latestProducts', 86400, function () {
            return Product::where('status', 'active')->select('id', 'name', 'image', 'price', 'slug', 'category_id')->take(21)->latest()->get();
        });

        $categories = Cache::remember('categories', 86400, function () {
            return Category::where('status', 1)
                ->select('id', 'name', 'logo', 'slug')
                ->get();
        });

        return view('frontend.home.index', compact(
            'mainBanner',
            'topBanner',
            'middleBanner',
            'bottomBanner',
            'todaysDeals',
            'latestProducts',
            'categories',
        ));
    }

    public function quickView($id)
    {
        Log::info($id);
        $product = Product::with(['category', 'galleries', 'variations'])->findOrFail($id);

        return view('frontend.home.partials.quick_view_modal', compact('product'))->render();
    }
}