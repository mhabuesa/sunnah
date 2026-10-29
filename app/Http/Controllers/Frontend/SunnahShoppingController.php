<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SunnahCategory;
use App\Models\SunnahProduct;
use Illuminate\Http\Request;

class SunnahShoppingController extends Controller
{
    public function index()
    {
        $sunnahCategories = SunnahCategory::where('status', '1')->orderBy('priority', 'asc')->with('subcategories')->get();

        // Initial load er somoy paginate ba get diye products anben
        $products = SunnahProduct::with('product')->where('status', '1')->paginate(8);

        return view('frontend.sunnah_shopping.index', compact(
            'sunnahCategories',
            'products',
        ));
    }

    public function getProducts(Request $request)
    {
        $query = SunnahProduct::with('product')->where('status', '1');

        if ($request->filled('subcategory_id')) {
            $query->where('subcategory_id', $request->subcategory_id);
        }

        $products = $query->paginate(8);

        if ($request->ajax()) {
            return response()->json([
                'product_html' => view('frontend.sunnah_shopping.partials.product_list', compact('products'))->render(),
                'pagination_html' => view('frontend.sunnah_shopping.partials.pagination', compact('products'))->render(),
            ]);
        }

        $sunnahCategories = SunnahCategory::where('status', '1')->orderBy('priority', 'asc')->with('subcategories')->get();
        return view('frontend.sunnah_shopping.index', compact('products', 'sunnahCategories'));
    }
}