<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class VariationController extends Controller
{
    public function index() {
        $attributes = Attribute::all();
        $colors = Color::all();
        return view("backend.variation.index", compact("attributes","colors"));
    }

    public function color_store(Request $request)
    {
        $request->validate([
            'color' => 'required|unique:colors,color|max:255',
        ]);

        Color::create([
            'color' => $request->color,
        ]);


        return redirect()->route('admin.attribute.index')->with('success', 'Color added successfully.');
    }

    public function color_destroy(string $id)
    {
        $color = Color::findOrFail($id);

        try {
            // Delete brand
            $color->delete();
        } catch (\Exception $e) {
            Log::error($e);
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Color Deleted Successfully'], 200);
    }

    public function colorUpdateAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'color' => 'required|unique:colors,color,' . $request->id,
        ]);

        // Return the validation errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        // Update the Brand
        $color = Color::findOrFail($request->id);

        $color->update([
            'color' => $request->color,
        ]);

        Session::flash('success', 'Color updated successfully');

        return response()->json([
            'success' => true
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'attribute' => 'required|unique:attributes,attribute|max:255',
        ]);

        Attribute::create([
            'attribute' => $request->attribute,
        ]);


        return redirect()->route('admin.attribute.index')->with('success', 'Attribute added successfully.');
    }

    public function destroy(string $id)
    {
        $attribute = Attribute::findOrFail($id);

        try {
            // Delete brand
            $attribute->delete();
        } catch (\Exception $e) {
            Log::error($e);
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Attribute Deleted Successfully'], 200);
    }

    public function updateAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attribute' => 'required|unique:attributes,attribute,' . $request->id,
        ]);

        // Return the validation errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        // Update the Brand
        $attribute = Attribute::findOrFail($request->id);

        $attribute->update([
            'attribute' => $request->attribute,
        ]);

        Session::flash('success', 'Brand updated successfully');

        return response()->json([
            'success' => true
        ]);
    }
}