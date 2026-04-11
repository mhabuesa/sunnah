<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('backend.coupon.index', compact('coupons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'coupon_type' => 'required',
            'coupon_title' => 'required',
            'coupon_code' => 'required|unique:coupons,coupon_code',
            'minimum_purchase' => 'required',
            'expire_date' => 'required',
        ]);

        Coupon::create([
            'coupon_type' =>  $request->coupon_type,
            'coupon_title' => $request->coupon_title,
            'coupon_code' => $request->coupon_code,
            'coupon_limit' => $request->coupon_limit,
            'discount_type' => $request->discount_type,
            'discount_amount' => $request->discount_amount,
            'minimum_purchase' => $request->minimum_purchase,
            'expire_date' => $request->expire_date,
        ]);

        return redirect()->route('admin.coupon.index')->with('success', 'Coupon Created Successfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'coupon_type' => 'required',
            'coupon_title' => 'required',
            'coupon_code' => [
                'required',
                Rule::unique('coupons', 'coupon_code')->ignore($request->id)
            ],
            'minimum_purchase' => 'required',
            'expire_date' => 'required|date',
        ]);

        $coupon = Coupon::findOrFail($request->id);

        $coupon->update([
            'coupon_type' => $request->coupon_type,
            'coupon_title' => $request->coupon_title,
            'coupon_code' => $request->coupon_code,
            'coupon_limit' => $request->coupon_limit,
            'discount_type' => $request->discount_type,
            'discount_amount' => $request->discount_amount,
            'minimum_purchase' => $request->minimum_purchase,
            'expire_date' => $request->expire_date,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Coupon updated successfully'
        ]);
    }

    public function status_update($id)
    {
        $coupon = Coupon::find($id);
        try {
            // Update banner status
            $coupon->update([
                'status' => $coupon->status == '1' ? '0' : '1',
            ]);
        } catch (\Exception $e) {
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Coupon status Updated Successfully'], 200);
    }

    public function destroy($id)
    {
        Coupon::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Coupon Deleted Successfully'
        ]);
    }
}