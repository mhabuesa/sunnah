<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Offer;
use App\Models\OfferProduct;
use App\Models\Product;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class OfferController extends Controller
{
    use ImageSaveTrait;

    public function index()
    {
        $offers = Offer::with(['product', 'coupon'])->orderBy('priority', 'asc')->get();
        $products = Product::all();
        $coupons = Coupon::all();
        return view('backend.offer.index', compact('offers', 'products', 'coupons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'type' => 'required|in:product,coupon_code',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'validity_date' => 'required|date',
        ]);

        if ($request->type === 'coupon_code') {
            $request->validate([
                'coupon_id' => 'required|exists:coupons,id',
                'product_id' => 'nullable',
            ]);
        }

        $maxPriority = Offer::max('priority') ?? 0;
        $priority = $maxPriority + 1;


        $data = $request->all();
        $data['priority'] = $priority;
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $imagePath = $this->saveImage('image', $request->file('image'));
            $data['image'] = $imagePath;
        }

        // Ensure only one of product_id or coupon_id is set based on type
        if ($data['type'] === 'product') {
            $data['coupon_id'] = null;
        }


        Offer::create($data);

        return redirect()->route('admin.offer.index')->with('success', 'Offer Created Successfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:offers,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'type' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'validity_date' => 'required|date',
            'priority' => 'required|integer',
            // 'slug' => 'required|string|max:255|unique:offers,slug,{id}',
        ]);
        $offer = Offer::findOrFail($request->id);

        if ($request->slug !== $offer->slug) {
            $request->validate([
                'slug' => 'required|string|max:255|unique:offers,slug',
            ]);
        }


        if ($request->type === 'coupon_code') {
            $request->validate([
                'coupon_id' => 'required|exists:coupons,id',
            ]);
        }

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($offer->image) {
                $this->deleteImage($offer->image);
            }
            $imagePath = $this->saveImage('image', $request->file('image'));
            $data['image'] = $imagePath;
        }

        if ($data['type'] === 'product') {
            $data['coupon_id'] = null;
        } else {
            $data['product_id'] = null;
        }

        $data['priority'] = $request->priority;
        $data['slug'] = $request->slug;

        $offer->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Offer updated successfully'
        ]);
    }

    public function status_update($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->update([
            'status' => $offer->status == 1 ? 0 : 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Offer status Updated Successfully'
        ], 200);
    }

    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        if ($offer->image) {
            $this->deleteImage($offer->image);
        }
        $offer->delete();

        return response()->json([
            'success' => true,
            'message' => 'Offer Deleted Successfully'
        ]);
    }

    public function product_assign($id)
    {
        $offer = Offer::findOrFail($id);
        $products = Product::all();
        $offerProducts = $offer->products;
        return view('backend.offer.product_assign', compact('offer', 'products', 'offerProducts'));
    }

    public function product_assign_store(Request $request, $id)
    {
        $offer = Offer::findOrFail($id);

        $request->validate([
            'product' => 'required|exists:products,id',
        ]);

        // Attach the product to the offer
        $offer->products()->attach($request->product);

        return redirect()->route('admin.offer.product.assign', $id)->with('success', 'Product assigned to offer successfully.');
    }

    public function product_destroy($id)
    {
        $product = OfferProduct::findOrFail($id);
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product Deleted Successfully'
        ]);
    }
}