<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BannerController extends Controller
{
    use ImageSaveTrait;

    public function index()
    {
        $banners = Banner::latest()->get();
        return view('backend.banner.index', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'banner_type' => 'required',
            'banner_url'  => 'required|url',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $banner_image = $this->saveImage('banner', $request->file('banner_image'));

        Banner::create([
            'type' => $request->banner_type,
            'url' => $request->banner_url,
            'image' => $banner_image
        ]);

        return redirect()->back()->with('success', 'Banner Added Successfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:banners,id',
            'banner_type' => 'required',
            'banner_url' => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $banner = Banner::findOrFail($request->id);

        $banner_image = $banner->image;

        // IMAGE UPDATE
        if ($request->hasFile('banner_image')) {

            if (!empty($banner->image)) {
                $this->deleteImage(public_path($banner->image));
            }

            $banner_image = $this->saveImage('banner', $request->file('banner_image'));
        }

        // UPDATE
        $banner->update([
            'type' => $request->banner_type,
            'url' => $request->banner_url,
            'image' => $banner_image
        ]);


        return response()->json([
            'success' => true,
            'message' => 'Banner updated successfully'
        ]);
    }

    public function status_update($id)
    {
        $banner = Banner::find($id);
        try {
            // Update banner status
            $banner->update([
                'status' => $banner->status == '1' ? '0' : '1',
            ]);
        } catch (\Exception $e) {
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Banner status Updated Successfully'], 200);
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);

        try {
            // Delete category
            $this->deleteImage(public_path($banner->image));
            $banner->delete();
        } catch (\Exception $e) {
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Banner Deleted Successfully'], 200);
    }
}