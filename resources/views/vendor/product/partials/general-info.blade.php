<div class="px-5 py-3 border rounded bg-gray-50/10">
    <h5 class="mb-3 font-semibold">General Information</h2>
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label class="inline-block mb-3">Product Name<strong class="text-red-600">*</strong></label>
                <input type="text" value="{{ old('name', $product->name) }}" class="w-full rounded"
                    id="taskTitle" name="name">
            </div>

            <div class="mb-3 ">
                <label for="short_description" class="inline-block mb-3">Short Description:</label>
                <textarea type="text"   class="w-full rounded" id="taskDescription" name="short_description">{{ old('short_description', $product->short_description) }}</textarea>
            </div>
            <div>
                <label for="description" class="inline-block mb-3">Full Description:</label>
                <textarea type="text" id="description" class="w-full rounded"   name="description">{{ old('description', $product->description) }}</textarea>
            </div>
        </div>
</div>
@push('script')
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ),{
            ckfinder: {
                uploadUrl: '{{route('admin.product.description.image').'?_token='.csrf_token()}}',
    }
        })
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush