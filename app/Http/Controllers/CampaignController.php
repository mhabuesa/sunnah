<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\LandingProduct;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CampaignController extends Controller
{
    use ImageSaveTrait;

    public function index()
    {
        $campaigns = Campaign::all();
        return view('backend.campaign.index', compact('campaigns'));
    }

    public function create()
    {
        return view('backend.campaign.create');
    }

    public function checkUrl(Request $request)
    {
        $exists = Campaign::where('campaign_url', $request->campaign_url)->exists();

        return response()->json([
            'exists' => $exists
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // file upload
        if ($request->hasFile('processes_main_image')) {
            $data['processes_main_image'] = $this->saveImage('campaign', $request->file('processes_main_image'));
        }

        if ($request->hasFile('processes_secondary_image')) {
            $data['processes_secondary_image'] = $this->saveImage('campaign', $request->file('processes_secondary_image'));
        }

        Campaign::create([
            'site_name'     => $data['site_name'],
            'campaign_name' => $data['campaign_name'],
            'campaign_url'  => $data['campaign_url'],
            'facebook'      => $data['facebook'],
            'whatsapp'      => $data['whatsapp'],

            'content' => collect($data)->except([
                '_token',
                'site_name',
                'campaign_name',
                'campaign_url',
                'facebook',
                'whatsapp'
            ])->toArray()
        ]);

        return back()->with('success', 'Saved');
    }

    public function edit(string $id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('backend.campaign.edit', compact('campaign'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'campaign_url' => [
                'required',
                Rule::unique('campaigns', 'campaign_url')->ignore($id),
            ],
        ]);
        $campaign = Campaign::findOrFail($id);

        $data = $request->all();

        // ================= IMAGE UPLOAD =================
        if ($request->hasFile('processes_main_image')) {
            $this->deleteImage(public_path($campaign->content['processes_main_image']));
            $data['processes_main_image'] = $this->saveImage('campaign', $request->file('processes_main_image'));
        } else {
            $data['processes_main_image'] = $campaign->content['processes_main_image'] ?? null;
        }

        if ($request->hasFile('processes_secondary_image')) {
            $this->deleteImage(public_path($campaign->content['processes_secondary_image']));
            $data['processes_secondary_image'] = $this->saveImage('campaign', $request->file('processes_secondary_image'));
        } else {
            $data['processes_secondary_image'] = $campaign->content['processes_secondary_image'] ?? null;
        }

        // ================= UPDATE =================
        $campaign->update([
            'site_name'     => $data['site_name'],
            'campaign_name' => $data['campaign_name'],
            'campaign_url'  => $data['campaign_url'],
            'facebook'      => $data['facebook'],
            'whatsapp'      => $data['whatsapp'],

            'content' => collect($data)->except([
                '_token',
                'site_name',
                'campaign_name',
                'campaign_url',
                'facebook',
                'whatsapp'
            ])->toArray()
        ]);

        return back()->with('success', 'Updated Successfully');
    }

    public function product_assign(string $id)
    {
        $campaign = Campaign::findOrFail($id);
        $products = LandingProduct::all();
        return view('backend.campaign.product_assign', compact('campaign', 'products'));
    }

    public function product_assigned(Request $request, string $id)
    {
        $campaign = Campaign::findOrFail($id);

        $campaign->update([
            'product' => $request->product_id
        ]);

        return redirect()->back()->with('success', 'Product Assigned Successfully');
    }




    public function product()
    {
        $products = LandingProduct::paginate(20);
        return view('backend.campaign.product.product', compact('products'));
    }

    public function product_create()
    {

        return view('backend.campaign.product.product_create');
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