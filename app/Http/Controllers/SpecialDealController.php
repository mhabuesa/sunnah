<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SpecialDeal;
use Illuminate\Http\Request;

class SpecialDealController extends Controller
{
    public function index()
    {
        $specialDeals = SpecialDeal::latest()->get();
        return view('backend.specialDeal.index', compact('specialDeals'));
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
            'product_id' => 'required|unique:special_deals,product_id',
            'validity' => 'required',
            'count' => 'required',
        ]);

        SpecialDeal::create([
            'product_id' => $request->product_id,
            'validity' => $request->validity,
            'available' => $request->count,
            'sold' => '0',
        ]);
        return redirect()->back()->with('success', 'Product Added to Special Deal');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:special_deals,id',
            'product_id' => 'required|exists:products,id|unique:special_deals,product_id,' . $request->id,
            'validity' => 'required|date',
            'count' => 'required|integer|min:0',
        ]);

        $specialDeal = SpecialDeal::findOrFail($request->id);

        $specialDeal->update([
            'product_id' => $request->product_id,
            'validity' => $request->validity,
            'available' => $request->count,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Special deal updated successfully',
        ]);
    }

    public function status_update($id)
    {
        $specialDeal = SpecialDeal::find($id);
        try {
            // Update banner status
            $specialDeal->update([
                'status' => $specialDeal->status == '1' ? '0' : '1',
            ]);
        } catch (\Exception $e) {
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Special Deal status Updated Successfully'], 200);
    }

    public function destroy($id)
    {
        $specialDeal = SpecialDeal::find($id);

        try {
            // Delete category
            $specialDeal->delete();
        } catch (\Exception $e) {
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Special Deal Deleted Successfully'], 200);
    }
}