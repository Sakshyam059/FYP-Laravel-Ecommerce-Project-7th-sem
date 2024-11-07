<div class="space-y-4">
    <label class="block text-xl font-medium" for="form3Example8">Logo </label>
    <label for="logo"
        class="flex flex-col items-center justify-center max-w-xs transition-colors duration-300 border rounded cursor-pointer bg-gray-50 hover:bg-gray-50">
        <div class="flex items-center gap-2 py-4" id="label-item">
            <svg id="" width="44px" height="44px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.2639 15.9375L12.5958 14.2834C11.7909 13.4851 11.3884 13.086 10.9266 12.9401C10.5204 12.8118 10.0838 12.8165 9.68048 12.9536C9.22188 13.1095 8.82814 13.5172 8.04068 14.3326L4.04409 18.2801M14.2639 15.9375L14.6053 15.599C15.4112 14.7998 15.8141 14.4002 16.2765 14.2543C16.6831 14.126 17.12 14.1311 17.5236 14.2687C17.9824 14.4251 18.3761 14.8339 19.1634 15.6514L20 16.4934M14.2639 15.9375L18.275 19.9565M18.275 19.9565C17.9176 20 17.4543 20 16.8 20H7.2C6.07989 20 5.51984 20 5.09202 19.782C4.71569 19.5903 4.40973 19.2843 4.21799 18.908C4.12796 18.7313 4.07512 18.5321 4.04409 18.2801M18.275 19.9565C18.5293 19.9256 18.7301 19.8727 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V16.4934M4.04409 18.2801C4 17.9221 4 17.4575 4 16.8V7.2C4 6.0799 4 5.51984 4.21799 5.09202C4.40973 4.71569 4.71569 4.40973 5.09202 4.21799C5.51984 4 6.07989 4 7.2 4H16.8C17.9201 4 18.4802 4 18.908 4.21799C19.2843 4.40973 19.5903 4.71569 19.782 5.09202C20 5.51984 20 6.0799 20 7.2V16.4934M17 8.99989C17 10.1045 16.1046 10.9999 15 10.9999C13.8954 10.9999 13 10.1045 13 8.99989C13 7.89532 13.8954 6.99989 15 6.99989C16.1046 6.99989 17 7.89532 17 8.99989Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            <span>Choose an Image</span>
        </div>
        <input id="logo" type="file" name="logo" accept="image/*" class="hidden file-input" onchange="previewLogo(event)">
        <div id="image-container" class="relative flex-col items-center {{$user->vendor->logo?'':'hidden'}}">
             <img src="{{ asset('asset/images/vendor/logo/'.$user->vendor->logo)}}" id="image-preview" src="#" alt="Image Preview" class="max-w-xs rounded shadow-lg">
            <button id="delete-button" type="button"
                class="absolute top-0 right-0 flex items-center justify-center p-2 text-white transition-colors duration-300 bg-red-500 rounded hover:bg-red-600"
                onclick="deleteImage()">
            <i class="bx bx-x"></i>
            </button>
        </div>
    </label>
</div>
<script>
    function previewLogo(event) {
        const input = event.target;
        const preview = document.getElementById('image-preview');
        const imageContainer = document.getElementById('image-container');

        if (input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                imageContainer.classList.remove('hidden');
                imageContainer.classList.add('flex');
                document.getElementById('label-item').classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            imageContainer.classList.add('hidden');
        }
    }

    function deleteImage() {
        const fileInput = document.getElementById('logo');
        const imagePreview = document.getElementById('image-preview');
        const imageContainer = document.getElementById('image-container');

        // Clear the file input
        fileInput.value = '';
        // Hide the image preview
        imagePreview.src = '';
        imageContainer.classList.add('hidden');
        document.getElementById('label-item').classList.remove('hidden');

    }
</script>