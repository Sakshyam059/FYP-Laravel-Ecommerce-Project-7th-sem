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
                        <span class="text-yellow-400">
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                        </span>
                        <h4 class="text-lg font-medium">{{$review->user->name}}</h4>
                    </div>
                </div>
                <p class="text-right">Aug 2020</p>
                <div class="col-span-2 py-2">
                    <h4 class="text-base font-medium">{{$review->review_title}}</h4>
                    <p>{{$review->comment_text}}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
