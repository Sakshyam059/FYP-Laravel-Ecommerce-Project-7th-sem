@extends('vendor.includes.main')
@section('content')
    <div class="">

        <div class="flex items-center justify-between px-3 py-3">
            <h4 class="text-xl">
                Add New Product
            </h4>
            <div class="flex px-0">
                {{-- @include('vendor.category.create')
                @include('vendor.subcategory.create') --}}

            </div>

        </div>
        <form method="post" action="{{ route('vendor.product.store') }}" class="grid grid-cols-[60%,40%]" enctype="multipart/form-data">
            @csrf
            <div class="p-3">
                @include('vendor.product.partials.general-info')
                @include('vendor.product.partials.pricing-info')
                @include('vendor.product.partials.size-and-color-info')
            </div>
            <div class="p-3">
                @include('vendor.product.partials.image-info')
                @include('vendor.product.partials.category-info')
                @include('vendor.product.partials.brand-info')
                @include('vendor.product.partials.additional-info')
    
    
                <div class="mt-3 ">
                    <div class="grid grid-cols-2 gap-5">
                        <a href="{{ route('vendor.product.index') }}" class="py-2 text-center border rounded bg-gray-50/40">Discard</a>
                        <button type="submit" class="py-2 text-center text-white border rounded bg-blue-600/90">Update Product</button>
                    </div>
                </div>
            </div>
    
        </form>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
    <script>
        $("document").ready(function() {
            $('#category').on('change', function() {
                var catId = $(this).val();
                console.log(catId);
                if (catId) {
                    $.ajax({
                        url: '/vendor/subcategory/' + catId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#subcategory').empty();
                            $('#subcategory').append(
                                '<option selected disabled>Choose a subcategory</option>');
                            $.each(data, function(key, value) {
                                console.log(value.subcategory_name)
                                $('#subcategory').append('<option value=" ' + value.id +
                                    '">' + value.subcategory_name + '</option>');
                            })
                        }

                    })
                }
            });
        });
    </script>
@endsection
