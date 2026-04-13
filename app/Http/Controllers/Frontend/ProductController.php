<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function product($slug)
    {
        $product = Product::where('slug', $slug)->with('category', 'subcategory', 'brand', 'meta', 'galleries', 'variations')->first();
        return view('frontend.product.single', compact('product'));
    }

    public function products()
    {
        $categories = Category::where('status', 1)
            ->withCount(['products' => function ($query) {
                $query->where('status', 'active');
            }])
            ->get(['id', 'name']);
        return view('frontend.product.all_products', compact('categories'));
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
}
