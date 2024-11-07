<div class="py-4 space-y-2">
    @foreach ($product->productReviews as $review)
        <div class="flex justify-between gap-6">
            <div>
                <img class="object-cover w-12 h-12 rounded-full"
                    src="{{ asset('frontend/assets/static/images/profile-2.jpg') }}" alt="">
            </div>
            <div class="grid w-full grid-cols-2">
                <div class="flex items-center gap-4">
                    <div>
                        <span>
                            @for ($i = 1; $i <= 5; $i++)
                                <span
                                    class="star text-xl {{ $i <= $product->averageRating() ? 'text-yellow-400' : 'text-gray-400' }}">
                                    @if ($i == ceil($product->averageRating()) && $product->averageRating() - floor($product->averageRating()) > 0)
                                        &#9734;
                                    @else
                                        &#9733;
                                    @endif
                                </span>
                            @endfor
                        </span>
                        <h4 class="text-lg font-medium">{{ $review->user->name }}</h4>
                    </div>
                </div>

                <p class="space-x-4 text-right">
                    @if (\App\Models\Order::hasUserOrderedProduct($review->user->id, $product->id))
                        <span class="font-medium text-blue-600">Purchase Verified</span>
                    @else
                        <span>Purchase Unverified</span>
                    @endif
                    <span>{{\Carbon\Carbon::parse($review->created_at)->format('M d')}}</span>
                </p>
                <div class="col-span-2 py-2">
                    <h4 class="text-base font-medium">{{ $review->review_title }}</h4>
                    <p>{{ $review->comment_text }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
