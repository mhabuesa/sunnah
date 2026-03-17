<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index() {
        $categories = Category::select('id','name')->get();
        return view("backend.pos.index", ['categories'=> $categories]);
    }

    public function getProducts(Request $request)
    {
        $query = Product::select('id', 'name', 'sku', 'price', 'image', 'category_id', 'brand_id', 'description')->latest();

        // category filter
        if ($request->category && $request->category != 'all') {
            $query->where('category_id', $request->category);
        }

        // search
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('sku', 'like', '%' . $request->search . '%');
            });
        }

        $products = $query->paginate(16);

        return response()->json([
            'html' => view('backend.pos.product_card', compact('products'))->render(),
            'pagination' => (string) $products->appends($request->all())->links('pagination::bootstrap-5')
        ]);
    }




}