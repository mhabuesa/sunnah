<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BrandController extends Controller
{
     use ImageSaveTrait;

    public function index()
    {
        $brands = Brand::orderBy('priority', 'asc')->get();
        return view('backend.brand.index', compact('brands'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands,name|max:255',
            'logo' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        $maxPriority = Brand::max('priority') ?? 0;
        $priority = $maxPriority + 1;

        $logo = $this->saveImage('brand', $request->file('logo'));

        Brand::create([
            'name' => $request->brand_name,
            'logo' => $logo,
            'slug' => Str::slug($request->brand_name),
            'priority' => $priority,
        ]);


        return redirect()->route('admin.brand.index')->with('success', 'Brand added successfully.');
    }


    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);

        try {
            // Delete brand
            $brand->delete();
        } catch (\Exception $e) {
            Log::error($e);
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Brand Deleted Successfully'], 200);
    }

    public function updateStatus($id)
    {
        $brand = Brand::find($id);
        try {
            // Update brand status
            $brand->update([
                'status' => $brand->status == '1' ? '0' : '1',
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Brand status Updated Successfully'], 200);
    }

    public function updateAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:brands,name,' . $request->id,
            'slug' => 'required|unique:brands,slug,' . $request->id,
            'priority' => 'required|integer',
            'logo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Return the validation errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        // Update the Brand
        $brand = Brand::findOrFail($request->id);

         if ($request->hasFile('logo')) {
            if (! empty($brand->logo)) {
                $this->deleteImage(public_path($brand->logo));
            }
            $logo = $this->saveImage('brand', $request->file('logo'));
        }

        $brand->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'priority' => $request->priority,
            'logo' => isset($logo) ? $logo : $brand->logo
        ]);

        Session::flash('success', 'Brand updated successfully');

        return response()->json([
            'success' => true
        ]);
    }
}
