<?php

namespace App\Http\Controllers;

use App\Jobs\BlogImageJob;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    use ImageSaveTrait;
    /*
    |--------------------------------------------------------------------------
    | Category List
    |--------------------------------------------------------------------------
    */
    public function category()
    {
        $categories = BlogCategory::orderBy('priority', 'asc')->get();

        return view('backend.blog.category', compact('categories'));
    }


    /*
    |--------------------------------------------------------------------------
    | Store Category
    |--------------------------------------------------------------------------
    */
    public function category_store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:blog_categories,name',
        ]);

        $maxPriority = BlogCategory::max('priority') ?? 0;

        BlogCategory::create([
            'name'     => $request->category_name,
            'slug'     => Str::slug($request->category_name),
            'priority' => $maxPriority + 1,
            'status'   => 1,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Category added successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Update Category
    |--------------------------------------------------------------------------
    */
    public function category_updateAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:blog_categories,name,' . $request->id,
            'slug' => 'required|unique:blog_categories,slug,' . $request->id,
            'priority' => 'required|integer',
        ]);

        // Return the validation errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        try {

            $category = BlogCategory::findOrFail($request->id);

            $category->update([
                'name'     => $request->name,
                'slug'     => $request->slug,
                'priority' => $request->priority,
            ]);

            Session::flash('success', 'Category updated successfully.');

            return response()->json([
                'success' => true,
                'message' => 'Category updated successfully.',
            ]);
        } catch (\Exception $e) {

            Log::error('Blog Category Update Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while updating category.',
            ], 500);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Update Category Status
    |--------------------------------------------------------------------------
    */
    public function category_updateStatus($id)
    {
        try {

            $category = BlogCategory::findOrFail($id);

            $category->update([
                'status' => $category->status == 1 ? 0 : 1,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Category status updated successfully.',
                'status'  => $category->status,
            ]);
        } catch (\Exception $e) {

            Log::error('Blog Category Status Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while updating status.',
            ], 500);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Category
    |--------------------------------------------------------------------------
    */
    public function category_destroy($id)
    {
        try {

            $category = BlogCategory::findOrFail($id);

            $category->delete();

            return response()->json([
                'success' => true,
                'message' => 'Category deleted successfully.',
            ]);
        } catch (\Exception $e) {

            Log::error('Blog Category Delete Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while deleting category.',
            ], 500);
        }
    }

    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('backend.blog.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::orderBy('priority', 'asc')->where('status', 1)->get();
        return view('backend.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'required',
        ]);


        // Slug Generation
        if ($request->blog_link) {
            $slug = $request->blog_link;
        } else {
            $slug = Str::slug($request->title);
        }
        $count = Blog::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count) {
            $slug = $slug . '_' . ($count + 1);
        }

        $blog = Blog::create([
            'title' => $request->title,
            'slug' => $slug,
            'category_id' => $request->category,
            'description' => $request->description,
            'content' => $request->content,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);



        // main image
        $ImagePath = null;
        if ($request->hasFile('image')) {
            $ImagePath = $request->file('image')->store('uploads/blog', 'public');
        }

        // Meta image
        $metaImagePath = null;
        if ($request->hasFile('meta_image')) {
            $metaImagePath = $request->file('meta_image')->store('uploads/blog/meta', 'public');
        }

        // dispatch job for heavy processing
        BlogImageJob::dispatch($blog->id, $ImagePath, $metaImagePath);

        return redirect()->route('admin.blog.index')->with('success', 'Blog created successfully.');
    }

    public function edit(string $id)
    {
        $blog = Blog::find($id);
        $categories = BlogCategory::orderBy('priority', 'asc')->where('status', 1)->get();

        return view('backend.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
        ]);


        $blog = Blog::findOrFail($id);

        $blog->update([
            'title' => $request->title,
            'slug' => $request->blog_link ? $request->blog_link : Str::slug($request->title),
            'category_id' => $request->category,
            'description' => $request->description,
            'content' => $request->content,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);


        /* ---------------- Image ---------------- */
        // main image
        $ImagePath = null;
        if ($request->hasFile('image')) {
            $this->deleteImage(public_path($blog->image));
            $ImagePath = $request->file('image')->store('uploads/blog', 'public');
        }

        // Meta image
        $metaImagePath = null;
        if ($request->hasFile('meta_image')) {
            $this->deleteImage(public_path($blog->meta_image));
            $metaImagePath = $request->file('meta_image')->store('uploads/blog/meta', 'public');
        }

        // dispatch job for heavy processing
        BlogImageJob::dispatch($blog->id, $ImagePath, $metaImagePath);

        return redirect()->route('admin.blog.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        try {

            $blog = Blog::findOrFail($id);

            $blog->delete();

            return response()->json([
                'success' => true,
                'message' => 'Blog deleted successfully.',
            ]);
        } catch (\Exception $e) {

            Log::error('Blog Delete Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while deleting blog.',
            ], 500);
        }
    }

    public function updateStatus($id)
    {
        try {

            $blog = Blog::findOrFail($id);

            $blog->update([
                'status' => $blog->status == 1 ? 0 : 1,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Blog status updated successfully.',
                'status'  => $blog->status,
            ]);
        } catch (\Exception $e) {

            Log::error('Blog Status Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while updating status.',
            ], 500);
        }
    }
}
