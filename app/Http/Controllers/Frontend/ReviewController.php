<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
            'review' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Create a new review
        $review = new Review();
        $review->product_id = $request->input('product_id');
        $review->customer_id = auth('customer')->id();
        $review->review = $request->input('review');
        $review->rating = $request->input('rating');
        $review->save();

        return redirect()->back()->with('success', 'Thank you for your review!');
    }

    public function productReviews(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $perPage = 10;


        $ratingCounts = Review::where('product_id', $product->id)
            ->selectRaw('rating, COUNT(*) as total')
            ->groupBy('rating')
            ->pluck('total', 'rating');

        $totalReviews = $ratingCounts->sum();

        $averageRating = Review::where('product_id', $product->id)
            ->avg('rating');

        $averageRating = round($averageRating ?? 0, 1);


        $reviews = Review::where('product_id', $product->id)
            ->with('customer:id,name')
            ->latest()
            ->paginate($perPage);

        return response()->json([
            'success' => true,

            'rating' => [
                'total_reviews' => $totalReviews,
                'average_rating' => $averageRating,
                'counts' => [
                    5 => $ratingCounts[5] ?? 0,
                    4 => $ratingCounts[4] ?? 0,
                    3 => $ratingCounts[3] ?? 0,
                    2 => $ratingCounts[2] ?? 0,
                    1 => $ratingCounts[1] ?? 0,
                ],
            ],

            'reviews' => $reviews->items(),

            'current_page' => $reviews->currentPage(),
            'last_page' => $reviews->lastPage(),
            'per_page' => $reviews->perPage(),
            'has_more' => $reviews->hasMorePages(),
        ]);
    }
}