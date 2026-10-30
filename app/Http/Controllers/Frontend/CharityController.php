<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CharityCategory;
use App\Models\CharityContent;
use App\Models\CharitySubcategory;
use Illuminate\Http\Request;

class CharityController extends Controller
{
    public function index()
    {
        $charityCategories = CharityCategory::where('status', '1')->orderBy('priority', 'asc')->get();
        return view('frontend.charity.index', compact([
            'charityCategories',
        ]));
    }

    public function charity_details($slug)
    {
        $category = CharityCategory::where('slug', $slug)->first();
        $subcategories = CharitySubcategory::where('category_id', $category->id)->orderBy('priority', 'asc')->get();
        $contents = CharityContent::where('category_id', $category->id)->where('status', '1')->orderBy('priority', 'asc')->get();
        return view('frontend.charity.details', compact([
            'category',
            'subcategories',
            'contents',
        ]));
    }

    public function zakatCalculator()
    {
        return view('frontend.charity.zakatCalculator');
    }
}