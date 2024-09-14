<div class="space-y-4">
    <h3 class="text-xl font-medium">Add a Review</h3>
    <form action="{{route('review.store',$product->id)}}" method="POST" class="space-y-4">
        @csrf
        <div class="flex items-center gap-4 ">
            <div class="flex items-center">
                <input type="radio" value="1" name="rating" id="one-star"
                class="hidden peer">
                <label for="one-star"  class="block px-4 py-2 border rounded peer-checked:bg-yellow-300 peer-checked:text-white">1 Star</label>
            </div>
            <div class="flex items-center">
                <input type="radio" value="2" name="rating" id="two-star"
                class="hidden peer">
                <label for="two-star"  class="block px-4 py-2 border rounded peer-checked:bg-yellow-300 peer-checked:text-white">2 Star</label>
            </div>
            <div class="flex items-center">
                <input type="radio"  value="3"  name="rating" id="three-star"
                class="hidden peer">
                <label for="three-star" class="block px-4 py-2 border rounded peer-checked:bg-yellow-300 peer-checked:text-white">3 Star</label>
            </div>
            <div class="flex items-center">
                <input type="radio" value="4" name="rating" id="four-star"
                class="hidden peer">
                <label for="four-star"  class="block px-4 py-2 border rounded peer-checked:bg-yellow-300 peer-checked:text-white">4 Star</label>
            </div>
            <div class="flex items-center">
                <input type="radio" value="5" name="rating" id="five-star"
                class="hidden peer">
                <label for="five-star"  class="block px-4 py-2 border rounded peer-checked:bg-yellow-300 peer-checked:text-white">5 Star</label>
            </div>
        </div>
        <div class="">
            <input type="text" placeholder="Title" name="review_title"
                class="w-full px-4 border-gray-200 rounded bg-gray-50">
        </div>
        <div class="">
            <textarea placeholder="Enter your comment and reviews" name="comment_text" class="w-full px-4 border-gray-200 rounded bg-gray-50"></textarea>
        </div>
        <div class="float-right">
            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded">Submit
                Review</button>
        </div>
    </form>
</div>