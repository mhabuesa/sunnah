<?php

namespace App\Http\Controllers;

use App\Models\LandingProduct;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    use ImageSaveTrait;

    public function index()
    {
        $products = LandingProduct::all();
        return view('backend.campaign.index', compact('products'));
    }



    
    public function product()
    {
        $products = LandingProduct::paginate(20);
        return view('backend.campaign.product', compact('products'));
    }

    public function product_create()
    {

        return view('backend.campaign.product_create');
    }

    public function product_store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required'
        ]);

        $image = $this->saveImage('product/campaign', $request->file('image'));

        LandingProduct::create([
            'name' => $request->name,
            'title' => $request->title,
            'old_price' => $request->old_price,
            'price' => $request->price,
            'image' => $image,
        ]);

        return redirect()->route('admin.campaign.product')->with('success', 'Product Created Successfull');
    }

    public function product_destroy(string $id)
    {
        $product = LandingProduct::findOrFail($id);

        try {
            $this->deleteImage(public_path($product->image));
            // Delete product
            $product->delete();
        } catch (\Exception $e) {
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Product Deleted Successfully'], 200);
    }
}