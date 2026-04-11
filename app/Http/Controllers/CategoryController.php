<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use ImageSaveTrait;

    public function index()
    {
        $categories = Category::orderBy('priority', 'asc')->get();
        return view('backend.category.index', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,name|max:255',
            'logo' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        $maxPriority = Category::max('priority') ?? 0;
        $priority = $maxPriority + 1;

        $logo = $this->saveImage('category', $request->file('logo'));

        Category::create([
            'name' => $request->category_name,
            'logo' => $logo,
            'slug' => Str::slug($request->category_name),
            'priority' => $priority,
        ]);


        return redirect()->route('admin.category.index')->with('success', 'Category added successfully.');
    }


    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        try {
            $this->deleteImage(public_path($category->logo));
            // Delete category
            $category->delete();
        } catch (\Exception $e) {
            Log::error($e);
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Category Deleted Successfully'], 200);
    }

    public function updateStatus($id)
    {
        $category = Category::find($id);
        try {
            // Update category status
            $category->update([
                'status' => $category->status == '1' ? '0' : '1',
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Category status Updated Successfully'], 200);
    }

    public function updateAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name,' . $request->id,
            'slug' => 'required|unique:categories,slug,' . $request->id,
            'priority' => 'required|integer',
            'logo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Return the validation errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        // Update the category
        $category = Category::findOrFail($request->id);

        if ($request->hasFile('logo')) {
            if (! empty($category->logo)) {
                $this->deleteImage(public_path($category->logo));
            }
            $logo = $this->saveImage('category', $request->file('logo'));
        }

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'priority' => $request->priority,
            'logo' => isset($logo) ? $logo : $category->logo
        ]);

        Session::flash('success', 'Category updated successfully');

        return response()->json([
            'success' => true
        ]);
    }
}