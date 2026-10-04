<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::where('status', 1)->get();
        $blogs = Blog::where('status', 1)->get();
        return view('frontend.blog.index', compact('categories', 'blogs'));
    }
    public function category_blogs($slug)
    {
        $categories = BlogCategory::where('status', 1)->get();
        $categoryData = BlogCategory::where('slug', $slug)->first();
        $blogs = $categoryData->blogs()->where('status', 1)->get();
        $latestBlogs = Blog::where('status', 1)->latest()->take(5)->get();
        return view('frontend.blog.category_blogs', compact('categoryData', 'blogs', 'categories', 'latestBlogs'));
    }

    public function detail($slug)
    {
        $categories = BlogCategory::where('status', 1)->get();

        $blog = Blog::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $latestBlogs = Blog::where('status', 1)
            ->where('id', '!=', $blog->id)
            ->latest()
            ->take(6)
            ->get();

        return view('frontend.blog.detail', compact(
            'blog',
            'categories',
            'latestBlogs'
        ));
    }

    public function search(Request $request)
    {
        $categories = BlogCategory::where('status', 1)->get();

        $searchTerm = $request->input('query');

        $blogs = Blog::where('status', 1)
            ->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
            })
            ->get();

        $latestBlogs = Blog::where('status', 1)->latest()->take(5)->get();

        return view('frontend.blog.search_results', compact(
            'blogs',
            'categories',
            'searchTerm',
            'latestBlogs'
        ));
    }
}
