<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessProductImages;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductMeta;
use App\Models\ProductVariation;
use App\Models\Subcategory;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

use function Illuminate\Log\log;

class ProductController extends Controller
{
    use ImageSaveTrait;
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $brands = Brand::where('status',1)->get();
        $categories = Category::where('status',1)->get();
        return view("backend.product.index",[
            "brands"=> $brands,
            "categories"=> $categories
        ]);
    }

    public function getList(Request $request)
    {
        $search = $request->input('search');
        $page   = $request->page ?? 1;

        $brand_id = $request->brand_id;
        $category_id = $request->category_id;
        $subcategory_id = $request->subcategory_id;

        $limit  = 10;
        $offset = ($page - 1) * $limit;

        $query = Product::latest();

        // Search
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                ->orWhere('price', 'like', "%{$search}%")
                ->orWhere('sku', 'like', "%{$search}%")
                ->orWhere('name', 'like', "%{$search}%");
            });
        }

        // Brand filter
        if ($brand_id) {
            $query->where('brand_id', $brand_id);
        }

        // Category filter
        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        // Subcategory filter
        if ($subcategory_id) {
            $query->where('subcategory_id', $subcategory_id);
        }

        $total = $query->count();

        $products = $query->skip($offset)->take($limit)->get();

        return response()->json([
            'data' => view('backend.product.product_rows', [
                'products' => $products,
                'page'   => $page,
                'limit'  => $limit,
                'offset' => $offset,
            ])->render(),

            'hasMore' => $total > $offset + $limit,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors = Color::all();
        $attributes = Attribute::all();
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status',1)->get();

        return view('backend.product.create', compact('colors','attributes', 'categories','brands'));
    }


    public function getSubcategories($id)
    {
        $subcategories = Subcategory::where('category_id', $id)->get();

        return response()->json($subcategories);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'category'=> 'required',
            'image' => 'required',
        ]);



        // Sku Generation
        $sku = $request->sku ?? random_int(100000, 999999);

        while (Product::where('sku', $sku)->exists()) {
            $sku = random_int(100000, 999999);
        }

        // Slug Generation
        $slug = Str::slug($request->name);

        $count = Product::where('slug', 'LIKE', "{$slug}%")->count();

        if ($count) {
            $slug = $slug . '-' . ($count + 1);
        }




        $product = Product::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'category_id'=> $request->category,
            'subcategory_id'=> $request->subcategory,
            'brand_id'=> $request->brand,
            'sku'=> $sku,
            'price'=> $request->unit_price,
            'stock'=> $request->current_stock,
            'discount_type'=> $request->discount_type,
            'discount'=> $request->discount,
            'video_url'=> $request->video,
            'slug'=> $slug,
        ]);

        //product Variation
        foreach ($request->color as $key => $color) {
            if(!$color) continue;

            ProductVariation::create([
                'product_id'   => $product->id,
                'color_id'     => $color,
                'attribute_id' => $request->attribute[$key] ?? null,
                'price'        => $request->price_variation[$key] ?? 0,
                'stock'        => $request->stock_variation[$key] ?? 0,
            ]);
        }


        if ($request->filled('meta_title')) {

            ProductMeta::create([
                'product_id'        => $product->id,
                'meta_title'        => $request->meta_title,
                'meta_description'  => $request->meta_description,
            ]);
        }


        // dd( $request->all());
         /* ---------------- Image ---------------- */
        // main image
        $mainImagePath = null;
        if ($request->hasFile('image')) {
            $mainImagePath = $request->file('image')->store('uploads/product', 'public');
        }

        // gallery
        $galleryPaths = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->gallery as $image) {
                $galleryPaths[] = $image->store('uploads/product/gallery', 'public');
            }
        }

        // Meta image
        $metaImagePath = null;
        if ($request->hasFile('meta_image')) {
            $metaImagePath = $request->file('meta_image')->store('uploads/product/meta', 'public');
        }

        // dispatch job for heavy processing
        ProcessProductImages::dispatch($product->id, $mainImagePath, $galleryPaths, $metaImagePath);

        return redirect()->route('admin.product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   $product = Product::find($id);
        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        try {
            // Delete product
            $product->delete();
        } catch (\Exception $e) {
            Log::error($e);

            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Product Deleted Successfully'], 200);
    }

    public function trash(){
        $products = Product::onlyTrashed()->latest()->get();
        return view('backend.product.trash', compact('products'));
    }

     public function restore($id)
    {
        $product = Product::withTrashed()->find($id);

        try {
            // Restore Post
            $product->restore();
        } catch (\Exception $e) {
            Log::error($e);

            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Post Restored Successfully'], 200);
    }

    public function destroy_permanently(string $id)
    {
       $product = Product::withTrashed()->find($id);
        $gallery = ProductGallery::where('product_id', $id)->get();

        try {
            // Delete Image
            // $this->deleteImage($product->image);

            // Delete Gallery Images
            if ($gallery->count() > 0) {
                foreach ($gallery as $image) {
                    $this->deleteImage($image->image);
                }
            }

            // Delete category
            $product->forceDelete();
        } catch (\Exception $e) {
            Log::error($e);

            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Product Permanently Deleted Successfully'], 200);
    }

    public function updateStatus($id)
    {
        $product = Product::find($id);
        try {
            // Update category status
            $product->update([
                'status' => $product->status == 'active' ? 'off' : 'active',
            ]);
        } catch (\Exception $e) {
            Log::error($e);

            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Product status Updated Successfully'], 200);
    }
    
    public function updateFeatured($id)
    {
        $product = Product::find($id);
        try {
            // Update category status
            $product->update([
                'is_featured' => $product->is_featured == 'active' ? 'off' : 'active',
            ]);
        } catch (\Exception $e) {
            Log::error($e);

            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Product Featured Updated Successfully'], 200);
    }
}