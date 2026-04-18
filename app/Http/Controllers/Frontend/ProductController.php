<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\TodaysDeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function product($slug)
    {
        $product = Product::where('slug', $slug)->with('category', 'subcategory', 'brand', 'meta', 'galleries', 'variations')->first();
        $relatedProduct = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
        return view('frontend.product.single', compact('product', 'relatedProduct'));
    }

    public function products()
    {
        $categories = Category::where('status', 1)
            ->withCount(['products' => function ($query) {
                $query->where('status', 'active');
            }])
            ->get(['id', 'name']);
        $banner = Banner::where('type', 'product_page')->first();
        return view('frontend.product.all_products', compact('categories', 'banner'));
    }

    public function ajaxProducts(Request $request)
    {
        Log::info($request->min_price . '-' . $request->max_price);
        try {

            $query = Product::query()
                ->where('status', 'active')
                ->with([
                    'orderDetails',
                    'category',
                    'variations.attribute',
                    'variations.attributeValue'
                ]);


            if (!empty($request->categories)) {
                $query->whereIn('category_id', $request->categories);
            }

            if ($request->min_price && $request->max_price) {
                $query->whereBetween('price', [$request->min_price, $request->max_price]);
            }

            if ($request->sort) {
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
                }
            }

            $products = $query->paginate(21);

            return response()->json([
                'html' => view('frontend.product.partials.product-list', compact('products'))->render(),
                'pagination' => $products->links('pagination::bootstrap-5')->render()
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
        $banner = Banner::where('type', 'product_page')->first();
        $products = Product::where('category_id', $category_id)
            ->paginate(21);
        return view('frontend.category.category_product', compact('category', 'banner', 'products'));
    }


    public function all_brands()
    {
        $brands = Brand::where('status', '1')
            ->paginate(18);
        return view('frontend.brand.brand_list', compact('brands'));
    }

    public function brand_product($slug)
    {
        $brand = Brand::where('slug', $slug)->first();
        $brand_id = $brand->id;
        $banner = Banner::where('type', 'product_page')->first();
        $products = Product::where('category_id', $brand_id)
            ->paginate(21);
        return view('frontend.brand.brand_product', compact('brand', 'banner', 'products'));
    }

    public function todaysDeal()
    {
        $productIds = TodaysDeal::where('status', 1)
            ->latest()
            ->pluck('product_id');

        $products = Product::whereIn('id', $productIds)
            ->latest()
            ->paginate(21);
        $banner = Banner::where('type', 'product_page')->first();
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
}