<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function store(Request $request, $product)
    {
        $data = $request->validate([
            'review_title' => 'required',
            'comment_text' => 'required',
            'rating' => 'required',
        ]);
        $data['user_id'] = Auth::id();
        $data['product_id'] = $product;

        ProductReview::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $product
            ],
            $data
        );
        return back();
    }
}
