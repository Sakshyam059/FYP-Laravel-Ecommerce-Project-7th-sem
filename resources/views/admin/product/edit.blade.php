@extends('admin.includes.main')
@section('content')
    <div class="">

        <div class="flex items-center justify-between px-3 py-3">
            <h4 class="text-xl">
                Add New Product
            </h4>
            <div class="flex px-0">
                {{-- @include('admin.category.create')
                @include('admin.subcategory.create') --}}

            </div>

        </div>
        <form method="post" action="{{route('admin.product.update',$product->id)}}" class="grid grid-cols-[60%,40%]" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="p-3">
                @include('admin.product.partials.general-info')
                @include('admin.product.partials.pricing-info')
                @include('admin.product.partials.additional-info')
            </div>
            <div class="p-3">
                @include('admin.product.partials.image-info')
                @include('admin.product.partials.category-info')
                @include('admin.product.partials.quantity-info')
    
    
                <div class="mt-3 ">
                    <div class="grid grid-cols-2 gap-5">
                        <a href="{{ route('admin.product.index') }}" class="py-2 text-center border rounded bg-gray-50/40">Discard</a>
                        <button type="submit" class="py-2 text-center text-white border rounded bg-blue-600/90">Add Product</button>
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
                        url: '/admin/subcategory/' + catId,
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
