<aside class="col-span-4 py-4 pl-3 pr-6">
    <div class="flex items-center justify-between mb-3">
        <div>
            <h5 class="text-gray-500">Showing latest products </h5>
        </div>
        <div class="flex items-center justify-end gap-3 text-sm">
            <form action="{{route('products.index')}}" method="GET" id="sortForm">
                <div class="flex items-center gap-2">
                    <label for="" class="">Sort By:</label>
                    <select name="sortBy" id="sortBy" class="text-sm bg-gray-100 rounded-lg ">
                        <option value="1" {{ request('sortBy')==1?'selected':''}}>Newest Arrival</option>
                        <option value="2" {{ request('sortBy')==2?'selected':''}}>Top Discounts</option>
                    </select>
                </div>
            </form>

            <div class="flex items-center justify-end gap-2">
                <span>View: </span>
                <div class="flex items-center border">
                    <button class="inline-flex items-center p-2 bg-gray-100" id="grid">
                        <i class='bx bxs-grid-alt'></i>
                    </button>
                    <button class="inline-flex items-center p-2" id="list">
                        <i class='bx bx-list-ul'></i>
                    </button>
                </div>
            </div>
        </div>


    </div>
    <div class="grid grid-cols-2 gap-6 py-2 lg:grid-cols-4" id="products">
        @foreach ($products as $product)
           <x-product :product="$product" />
           <x-product :product="$product" />
           <x-product :product="$product" />
           <x-product :product="$product" />
           <x-product :product="$product" />
        @endforeach
    </div>
</aside>
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#grid').click(function(event) {
                event.preventDefault();
                $('#products').addClass('grid-cols-4');
                $('#list').removeClass('bg-gray-100');
                $('#grid').addClass('bg-gray-100');
                $('.product-card').removeClass('flex space-x-2');
            });
            $('#list').click(function(event) {
                event.preventDefault();
                $('#products').removeClass('grid-cols-4 lg:grid-cols-4');
                $('#grid').removeClass('bg-gray-100');
                $('#list').addClass('bg-gray-100');
                $('.product-card').addClass('flex space-x-2');
            });
        });
    </script>
    <script>
        document.getElementById('sortBy').addEventListener('change', function() {
            document.getElementById('sortForm').submit();
        });
    </script>
@endpush
