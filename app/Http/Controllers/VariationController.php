<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeValue;
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
        $atributeValues = AttributeValue::all();
        return view("backend.variation.index", compact("attributes","atributeValues"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'attribute' => 'required|unique:attributes,name|max:255',
        ]);

        Attribute::create([
            'name' => $request->attribute,
        ]);


        return redirect()->route('admin.attribute.index')->with('success', 'Attribute added successfully.');
    }

    public function value_store(Request $request)
    {
        $request->validate([
            'value' => 'required|max:255',
        ]);

        foreach ($request->value as $key => $value) {
            if(!$value) continue;

            AttributeValue::create([
                'attribute_id'   => $request->attribute_id,
                'value'     => $value,
            ]);
        }

        return redirect()->route('admin.attribute.index')->with('success', 'Attribyte Value Added successfully.');
    }

    public function value_destroy(string $id)
    {
        $attribute = AttributeValue::findOrFail($id);

        try {
            // Delete brand
            $attribute->delete();
        } catch (\Exception $e) {
            Log::error($e);
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Attribute Value Deleted Successfully'], 200);
    }

    public function valueUpdateAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required',
        ]);

        // Return the validation errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        // Update the Brand
        $value = AttributeValue::findOrFail($request->id);

        $value->update([
            'value' => $request->value,
        ]);

        Session::flash('success', 'Attribute Value updated successfully');

        return response()->json([
            'success' => true
        ]);
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
            'attribute' => 'required|unique:attributes,name,' . $request->id,
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
            'name' => $request->attribute,
        ]);

        Session::flash('success', 'Brand Attribute updated successfully');

        return response()->json([
            'success' => true
        ]);
    }
}