<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Cache::remember('categories', 86400, function () {
            return Category::where('status', 1)->select('id', 'name', 'logo', 'slug')->get();
        });
        return view('frontend.home', compact('categories'));
    }
}
