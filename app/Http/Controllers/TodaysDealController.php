<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TodaysDeal;
use Illuminate\Http\Request;

class TodaysDealController extends Controller
{
    public function index()
    {
        $todaysDeals = TodaysDeal::latest()->get();
        return view('backend.todaysDeal.index', compact('todaysDeals'));
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
            'product_id' => 'required|unique:todays_deals,product_id',
        ]);

        TodaysDeal::create([
            'product_id' => $request->product_id,
        ]);
        return redirect()->back()->with('success', 'Product Added to Todays Deal');
    }

    public function status_update($id)
    {
        $todaysDeal = TodaysDeal::find($id);
        try {
            // Update banner status
            $todaysDeal->update([
                'status' => $todaysDeal->status == '1' ? '0' : '1',
            ]);
        } catch (\Exception $e) {
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Todays Deal status Updated Successfully'], 200);
    }

    public function destroy($id)
    {
        $todaysDeal = TodaysDeal::find($id);

        try {
            // Delete category
            $todaysDeal->delete();
        } catch (\Exception $e) {
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Todays Deal Deleted Successfully'], 200);
    }
}