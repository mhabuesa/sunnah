<?php

namespace App\Http\Controllers;

use App\Models\CharityCategory;
use App\Models\CharityContent;
use App\Models\CharitySubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CharityController extends Controller
{
    public function categoryIndex()
    {
        $categories = CharityCategory::orderBy('priority', 'asc')->get();
        return view('backend.charity.category', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255|unique:charity_categories,category',
        ]);

        $maxPriority = CharityCategory::max('priority') ?? 0;
        $priority = $maxPriority + 1;


        $data = $request->all();
        $data['priority'] = $priority;
        $data['slug'] = Str::slug($request->category);

        CharityCategory::create($data);

        return redirect()->route('admin.charity.category.index')->with('success', 'Category Created Successfully');
    }

    public function updateCategory(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255|unique:charity_categories,category,' . $request->id,
            'priority' => 'required|integer|min:0',
            'slug' => 'required|string|max:255|unique:charity_categories,slug,' . $request->id,
        ]);

        $category = CharityCategory::findOrFail($request->id);
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
        $category = CharityCategory::findOrFail($id);
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully'
        ]);
    }

    public function toggleStatusCategory($id)
    {
        $category = CharityCategory::findOrFail($id);
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
        $subcategories = CharitySubcategory::with('category')->orderBy('category_id')->orderBy('priority', 'asc')->get();
        $categories = CharityCategory::where('status', '1')->get();
        return view('backend.charity.subcategory', compact('subcategories', 'categories'));
    }

    public function storeSubcategory(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'subcategory' => 'required|string|max:255|unique:charity_subcategories,subcategory',
        ]);

        $maxPriority = CharitySubcategory::max('priority') ?? 0;
        $priority = $maxPriority + 1;

        $slug = Str::slug($request->subcategory);

        CharitySubcategory::create([
            'category_id' => $request->category,
            'subcategory' => $request->subcategory,
            'slug' => $slug,
            'priority' => $priority,
        ]);

        return redirect()->route('admin.charity.subcategory.index')->with('success', 'Subcategory Created Successfully');
    }

    public function updateSubcategory(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:charity_subcategories,id',
            'category' => 'required|integer|exists:charity_categories,id',
            'subcategory' => 'required|string|max:255|unique:charity_subcategories,subcategory,' . $request->id,
            'priority' => 'required|integer',
            'slug' => 'required|string|max:255|unique:charity_subcategories,slug,' . $request->id,
        ]);

        $subcategory = CharitySubcategory::findOrFail($request->id);

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
        $subcategory = CharitySubcategory::findOrFail($id);
        $subcategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'Subcategory deleted successfully'
        ]);
    }

    public function toggleStatusSubcategory($id)
    {
        $subcategory = CharitySubcategory::findOrFail($id);
        $subcategory->update([
            'status' => $subcategory->status == 1 ? 0 : 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Subcategory status updated successfully'
        ]);
    }


    public function content()
    {
        $charityContents = CharityContent::orderBy('priority', 'asc')->get();
        return view('backend.charity.content', [
            'charityContents' => $charityContents,
        ]);
    }

    public function content_create()
    {
        $categories = CharityCategory::where('status', '1')->get();
        return view('backend.charity.content_create', [
            'categories' => $categories,
        ]);
    }

    public function getSubcategories(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer|exists:charity_categories,id',
        ]);

        $subcategories = CharitySubcategory::where('category_id', $request->category_id)
            ->where('status', 1)
            ->orderBy('priority', 'asc')
            ->get(['id', 'subcategory']);

        return response()->json($subcategories);
    }

    public function contentStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required|integer',
            'subcategory' => 'required|integer',
            'content' => 'required',
        ]);

        $maxPriority = CharityContent::max('priority') ?? 0;
        $priority = $maxPriority + 1;

        CharityContent::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'subcategory_id' => $request->subcategory,
            'priority' => $priority,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.charity.content')->with('success', 'Content Saved Successfully');
    }

    public function content_edit($id)
    {
        $content = CharityContent::findOrFail($id);
        $categories = CharityCategory::where('status', '1')->get();
        return view('backend.charity.content_edit', [
            'content' => $content,
            'categories' => $categories,
        ]);
    }
    public function updateContent(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required|integer',
            'subcategory' => 'required|integer',
            'priority' => 'required',
            'content' => 'required',
        ]);

        $content = CharityContent::findOrFail($id);
        $content->update([
            'title' => $request->title,
            'category_id' => $request->category,
            'subcategory_id' => $request->subcategory,
            'priority' => $request->priority,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.charity.content')->with('success', 'Content Saved Successfully');
    }

    public function destroyProduct($id)
    {
        $product = CharityContent::findOrFail($id);
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Content deleted successfully'
        ]);
    }
}