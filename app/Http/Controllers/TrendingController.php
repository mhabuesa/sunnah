<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TrendingProduct;
use Illuminate\Http\Request;

class TrendingController extends Controller
{
    public function index()
    {
        $trendingProducts = TrendingProduct::latest()->get();
        return view('backend.trending.index', compact('trendingProducts'));
    }

    public function searchProduct(Request $request)
    {
        $search = $request->q;

        $products = Product::where('name', 'LIKE', "%{$search}%")
            ->select('id', 'name')
            ->get();

        return response()->json($products);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|unique:trending_products,product_id',
        ]);

        TrendingProduct::create([
            'product_id' => $request->product_id,
        ]);
        return redirect()->back()->with('success', 'Product Added to Trending');
    }

    public function status_update($id)
    {
        $trending = TrendingProduct::find($id);
        try {
            // Update banner status
            $trending->update([
                'status' => $trending->status == '1' ? '0' : '1',
            ]);
        } catch (\Exception $e) {
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Trending Product status Updated Successfully'], 200);
    }

    public function destroy($id)
    {
        $trending = TrendingProduct::find($id);

        try {
            // Delete category
            $trending->delete();
        } catch (\Exception $e) {
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Trending Product Deleted Successfully'], 200);
    }
}