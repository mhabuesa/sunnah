<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\FeaturedProduct;
use App\Models\NewsletterSubscriber;
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

        // Latest Products
        $latestProducts = Cache::remember('latestProducts', 86400, function () {
            return Product::where('status', 'active')->select('id', 'name', 'image', 'price', 'slug', 'category_id')->take(21)->latest()->get();
        });

        $categories = Cache::remember('categories', 86400, function () {
            return Category::where('status', 1)
                ->select('id', 'name', 'logo', 'slug')
                ->get();
        });



        $recentlyViewed = request()->cookie('recently_viewed_products', []);

        if (is_string($recentlyViewed)) {
            $recentlyViewed = json_decode($recentlyViewed, true) ?? [];
        }

        $recentProducts = Product::whereIn('id', $recentlyViewed)
            ->get()
            ->sortBy(function ($product) use ($recentlyViewed) {
                return array_search($product->id, $recentlyViewed);
            })
            ->values();

        return view('frontend.home.index', compact(
            'mainBanner',
            'topBanner',
            'middleBanner',
            'bottomBanner',
            'todaysDeals',
            'latestProducts',
            'categories',
            'recentProducts'
        ));
    }

    public function newsletter_subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        if (NewsletterSubscriber::where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', 'You are already subscribed to the newsletter.');
        }

        try {
            NewsletterSubscriber::create([
                'email' => $request->email,
            ]);

            return redirect()->back()->with('success', 'Subscribed to newsletter successfully.');
        } catch (\Exception $e) {
            Log::error('Newsletter subscription error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while subscribing. Please try again later.');
        }
       
    }
}