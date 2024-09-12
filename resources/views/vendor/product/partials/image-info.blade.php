<style>
    #preview-container div.group:first-child {
        grid-column: 1/5;
    }

    #preview-container div.group:first-child img {
        height: 140px;
        object-fit: contain;
        object-position: center;
    }
</style>
<div class="px-5 py-3 border rounded ">
    <h5 class="mb-3 font-semibold">Product Images</h2>
        <div id="preview-container" class="grid grid-cols-4 gap-4 ">
            @if (!empty($product))
                @foreach ($product->allImage as $image)
                <div class="relative group w-fit">
                    <img class="object-cover h-16 mb-2 rounded-md" src="{{ asset('asset/images/product/'.$image->image) }}" alt="">
                    <button id="deleteImage" class="absolute top-0 right-0 inline-flex items-center p-1 text-sm text-white transition bg-red-500 border-none rounded-md opacity-100 group-hover:opacity-100">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                @endforeach
            @endif
        </div>
        <label id="drop-zone"
            class="flex flex-col items-center w-full p-6 transition border-2 border-gray-300 border-dashed rounded-md cursor-pointer h-28 hover:border-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-2 text-gray-400" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
            </svg>
            <span class="text-sm text-gray-600">
                Drop files here or
                <span class="text-blue-600 underline">browse</span>
            </span>
            <input type="file" name="image[]" class="hidden" id="file-input" multiple>
        </label>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('file-input');
        const previewContainer = document.getElementById('preview-container');

        dropZone.addEventListener('dragover', function(e) {
            e.preventDefault();
            dropZone.classList.add('border-gray-400');
        });

        dropZone.addEventListener('dragleave', function() {
            dropZone.classList.remove('border-gray-400');
        });

        dropZone.addEventListener('drop', function(e) {
            e.preventDefault();
            dropZone.classList.remove('border-gray-400');

            const files = e.dataTransfer.files;
            handleFiles(files);
        });

        fileInput.addEventListener('change', function() {
            const files = fileInput.files;
            handleFiles(files);
        });

        function handleFiles(files) {
            for (const file of files) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewItem = createPreviewItem(e.target.result);
                    previewContainer.appendChild(previewItem);
                };
                reader.readAsDataURL(file);
            }

        }

        function createPreviewItem(imageSrc) {
            const previewItem = document.createElement('div');
            previewItem.classList.add('relative', 'group');

            const removeButton = document.createElement('button');
            removeButton.innerHTML = '<i class="bx bx-x"></i>';
            removeButton.classList.add('absolute','text-sm', 'top-0', 'right-0','inline-flex','items-center', 'text-white', 'bg-red-500',
                'border-none', 'rounded-md', 'p-1', 'opacity-100', 'group-hover:opacity-100', 'transition');

            const previewImage = document.createElement('img');
            previewImage.src = imageSrc;
            previewImage.classList.add('w-full', 'h-16', 'object-cover', 'rounded-md', 'mb-2');

            removeButton.addEventListener('click', function() {
                previewContainer.removeChild(previewItem);
            });

            previewItem.appendChild(previewImage);
            previewItem.appendChild(removeButton);

            return previewItem;
        }
    });
</script>
