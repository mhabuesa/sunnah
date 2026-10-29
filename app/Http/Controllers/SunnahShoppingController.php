<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SunnahCategory;
use App\Models\SunnahProduct;
use App\Models\SunnahSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SunnahShoppingController extends Controller
{
    public function categoryIndex()
    {
        $categories = SunnahCategory::orderBy('priority', 'asc')->get();
        return view('backend.sunnah_shopping.category', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255|unique:sunnah_categories,category',
        ]);

        $maxPriority = SunnahCategory::max('priority') ?? 0;
        $priority = $maxPriority + 1;


        $data = $request->all();
        $data['priority'] = $priority;
        $data['slug'] = Str::slug($request->category);

        SunnahCategory::create($data);

        return redirect()->route('admin.sunnah.category.index')->with('success', 'Category Created Successfully');
    }

    public function updateCategory(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255|unique:sunnah_categories,category,' . $request->id,
            'priority' => 'required|integer|min:0',
            'slug' => 'required|string|max:255|unique:sunnah_categories,slug,' . $request->id,
        ]);




        $category = SunnahCategory::findOrFail($request->id);
        $category->update([
            'category' => $request->category,
            'priority' => $request->priority,
            'slug' => $request->slug
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully'
        ]);
    }

    public function destroyCategory($id)
    {
        $category = SunnahCategory::findOrFail($id);

        if ($category->subcategories()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete category because it contains subcategories.'
            ], 422);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully'
        ]);
    }

    public function toggleStatusCategory($id)
    {
        $category = SunnahCategory::findOrFail($id);
        $category->update([
            'status' => $category->status == 1 ? 0 : 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Category status updated successfully'
        ]);
    }

    public function subcategoryIndex()
    {
        $subcategories = SunnahSubcategory::with('category')->orderBy('category_id')->orderBy('priority', 'asc')->get();
        $categories = SunnahCategory::where('status', '1')->get();
        return view('backend.sunnah_shopping.subcategory', compact('subcategories', 'categories'));
    }

    public function storeSubcategory(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'subcategory' => 'required|string|max:255|unique:sunnah_subcategories,subcategory',
        ]);

        $maxPriority = SunnahSubcategory::max('priority') ?? 0;
        $priority = $maxPriority + 1;

        $slug = Str::slug($request->subcategory);

        SunnahSubcategory::create([
            'category_id' => $request->category,
            'subcategory' => $request->subcategory,
            'slug' => $slug,
            'priority' => $priority,
        ]);

        return redirect()->route('admin.sunnah.subcategory.index')->with('success', 'Subcategory Created Successfully');
    }

    public function updateSubcategory(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:sunnah_subcategories,id',
            'category' => 'required|integer|exists:sunnah_categories,id',
            'subcategory' => 'required|string|max:255|unique:sunnah_subcategories,subcategory,' . $request->id,
            'priority' => 'required|integer',
            'slug' => 'required|string|max:255|unique:sunnah_subcategories,slug,' . $request->id,
        ]);

        $subcategory = SunnahSubcategory::findOrFail($request->id);

        $subcategory->update([
            'category_id' => $request->category,
            'subcategory' => $request->subcategory,
            'priority' => $request->priority,
            'slug' => $request->slug,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Subcategory updated successfully',
        ]);
    }

    public function destroySubcategory($id)
    {
        $subcategory = SunnahSubcategory::findOrFail($id);
        $subcategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'Subcategory deleted successfully'
        ]);
    }

    public function toggleStatusSubcategory($id)
    {
        $subcategory = SunnahSubcategory::findOrFail($id);
        $subcategory->update([
            'status' => $subcategory->status == 1 ? 0 : 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Subcategory status updated successfully'
        ]);
    }

    public function products()
    {
        $categories = SunnahCategory::where('status', '1')->get();
        $products = Product::where('status', 'active')->get();
        $sunnahProducts = SunnahProduct::all();
        return view('backend.sunnah_shopping.product_assign', [
            'categories' => $categories,
            'products' => $products,
            'sunnahProducts' => $sunnahProducts,
        ]);
    }

    public function getSubcategories(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer|exists:sunnah_categories,id',
        ]);

        $subcategories = SunnahSubcategory::where('category_id', $request->category_id)
            ->where('status', 1)
            ->orderBy('priority', 'asc')
            ->get(['id', 'subcategory']);

        return response()->json($subcategories);
    }

    public function storeProduct(Request $request) {
         $request->validate([
            'category' => 'required|integer',
            'subcategory' => 'required|integer',
            'product' => 'required|integer',
        ]);
        
        SunnahProduct::create([
           'category_id' => $request->category, 
           'subcategory_id' => $request->subcategory, 
           'product_id' => $request->product, 
        ]);

        return redirect()->route('admin.sunnah.products.index')->with('success', 'Product Assigned Successfully');
    }

     public function destroyProduct($id)
    {
        $product = SunnahProduct::findOrFail($id);
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully'
        ]);
    }
}