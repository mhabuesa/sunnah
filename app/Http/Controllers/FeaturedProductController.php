<?php

namespace App\Http\Controllers;

use App\Models\FeaturedProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class FeaturedProductController extends Controller
{
    public function index()
    {
        $featuredProducts = FeaturedProduct::latest()->get();
        return view('backend.featuredProducts.index', compact('featuredProducts'));
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
            'product_id' => 'required|unique:featured_products,product_id',
        ]);

        FeaturedProduct::create([
            'product_id' => $request->product_id,
        ]);
        return redirect()->back()->with('success', 'Product Added to Featured Products');
    }

    public function status_update($id)
    {
        $featuredProduct = FeaturedProduct::find($id);
        try {
            // Update banner status
            $featuredProduct->update([
                'status' => $featuredProduct->status == '1' ? '0' : '1',
            ]);
        } catch (\Exception $e) {
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Featured Product status Updated Successfully'], 200);
    }

    public function destroy($id)
    {
        $featuredProduct = FeaturedProduct::find($id);

        try {
            // Delete category
            $featuredProduct->delete();
        } catch (\Exception $e) {
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Featured Product Deleted Successfully'], 200);
    }
}