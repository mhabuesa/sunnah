<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\FeaturedProduct;
use App\Models\Product;
use App\Models\Review;
use App\Models\Subcategory;
use App\Models\TodaysDeal;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function product($slug)
    {
        if (Product::where('slug', $slug)->doesntExist()) {
            abort(404);
        }

        $product = Product::where('slug', $slug)
            ->with(
                'category',
                'subcategory',
                'brand',
                'meta',
                'galleries',
                'variations'
            )
            ->first();

        // Store product in recently viewed
        $this->recentlyViewed($product->id);

        $relatedProduct = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->get();

        $cartCount = CartService::count();

        $banner = Cache::remember('homeBanners', 86400, function () {
            return Banner::where('status', 1)->get();
        });

        $productBanner = $banner->where('type', 'product_banner')->first();

        return view('frontend.product.single', compact(
            'product',
            'relatedProduct',
            'cartCount',
            'productBanner'
        ));
    }

    public function products()
    {
        $categories = Category::where('status', 1)
            ->withCount(['products' => function ($query) {
                $query->where('status', 'active');
            }])
            ->get(['id', 'name']);

        $brands = Brand::where('status', 1)
            ->withCount(['products' => function ($query) {
                $query->where('status', 'active');
            }])
            ->get(['id', 'name']);
        $banner = Banner::where('type', 'product_banner')->first();
        return view('frontend.product.all_products', compact('categories', 'brands', 'banner'));
    }

    public function ajaxProducts(Request $request)
    {
        try {

            $query = Product::query()
                ->where('status', 'active')
                ->with([
                    'orderDetails',
                    'category',
                    'variations.attribute',
                    'variations.attributeValue'
                ]);


            // Category Filter
            if (!empty($request->categories)) {
                $query->whereIn('category_id', $request->categories);
            }


            // Brand Filter
            if (!empty($request->brands)) {
                $query->whereIn('brand_id', $request->brands);
            }


            // Price Filter
            if ($request->filled('min_price') && $request->filled('max_price')) {
                $query->whereBetween('price', [
                    $request->min_price,
                    $request->max_price
                ]);
            }


            // Sorting
            switch ($request->sort) {

                case 'low':
                    $query->orderBy('price', 'asc');
                    break;

                case 'high':
                    $query->orderBy('price', 'desc');
                    break;

                case 'aToz':
                    $query->orderBy('name', 'asc');
                    break;

                case 'zToa':
                    $query->orderBy('name', 'desc');
                    break;

                case 'pop':
                    $query->withCount('orderDetails')
                        ->orderBy('order_details_count', 'desc');
                    break;

                default:
                    $query->latest();
                    break;
            }


            // Pagination
            $products = $query->paginate(21);


            return response()->json([
                'html' => view(
                    'frontend.product.partials.product-list',
                    compact('products')
                )->render(),

                'pagination' => $products
                    ->links('pagination::bootstrap-5')
                    ->render(),
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function category_products($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category_id = $category->id;
        $banner = Banner::where('type', 'product_banner')->where('status', 1)->first();
        $products = Product::where('category_id', $category_id)
            ->paginate(21);
        return view('frontend.category.category_product', compact('category', 'banner', 'products'));
    }

    public function subcategory_products($slug)
    {
        $subcategory = Subcategory::where('slug', $slug)->first();
        $subcategory_id = $subcategory->id;
        $banner = Banner::where('type', 'product_banner')->where('status', 1)->first();
        $products = Product::where('subcategory_id', $subcategory_id)
            ->paginate(21);
        return view('frontend.subcategory.subcategory_product', compact('subcategory', 'banner', 'products'));
    }


    public function brands()
    {
        $brands = Brand::where('status', '1')->orderBy('priority', 'asc')
            ->paginate(14);
        return view('frontend.brand.brand_list', compact('brands'));
    }

    public function brand_product($slug)
    {
        $brand = Brand::where('slug', $slug)->first();
        $brand_id = $brand->id;
        $banner = Banner::where('type', 'product_banner')->first();
        $products = Product::where('brand_id', $brand_id)
            ->paginate(21);
        return view('frontend.brand.brand_product', compact('brand', 'banner', 'products'));
    }

    public function supperDeals()
    {
        $productIds = FeaturedProduct::where('status', 1)
            ->latest()
            ->pluck('product_id');

        $products = Product::whereIn('id', $productIds)
            ->latest()
            ->paginate(21);
        $banner = Banner::where('type', 'product_banner')->first();
        return view('frontend.supperDeals.supperDeals_product', compact('banner', 'products'));
    }
    public function todaysDeal()
    {
        $productIds = TodaysDeal::where('status', 1)
            ->latest()
            ->pluck('product_id');

        $products = Product::whereIn('id', $productIds)
            ->latest()
            ->paginate(21);
        $banner = Banner::where('type', 'product_banner')->first();
        return view('frontend.todaysDeal.todaysDeal_product', compact('banner', 'products'));
    }

    public function search_product_ajax(Request $request)
    {
        $query = $request->search;

        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->latest()
            ->take(5)
            ->get();

        return response()->json($products);
    }

    public function search_product(Request $request)
    {
        $query = $request->q;
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->latest()
            ->paginate(21);
        $banner = Banner::where('type', 'product_banner')->first();
        return view('frontend.search.search_page', compact('products', 'banner'));
    }


















    private function recentlyViewed($productId)
    {
        $recentlyViewed = request()->cookie('recently_viewed_products', []);

        if (is_string($recentlyViewed)) {
            $recentlyViewed = json_decode($recentlyViewed, true) ?? [];
        }

        // Remove product if already exists
        $recentlyViewed = array_values(
            array_diff($recentlyViewed, [$productId])
        );

        // Add current product at the beginning
        array_unshift($recentlyViewed, $productId);

        // Keep only latest 10 products
        $recentlyViewed = array_slice($recentlyViewed, 0, 10);

        // Store cookie for 30 days
        cookie()->queue(
            'recently_viewed_products',
            json_encode($recentlyViewed),
            60 * 24 * 30
        );
    }
}