<div class="space-y-4 ">
    <h2 class='text-xl font-semibold '>ID Verification</h2>
    <div class="space-y-2">
        <label class="font-medium">Account Type:</label>
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-2">
                <input class="hidden peer" type="radio" value="individual" name="account_type" id="individual" >
                <label for="individual" 
                    class="block px-12 py-4 border rounded peer-checked:bg-green-400 peer-checked:text-white bg-gray-50">Individual</label>
            </div>
            <div class="flex items-center gap-2">
                <input class="hidden peer" type="radio" value="business" name="account_type" id="business" >
                <label for="business"
                    class="block px-12 py-4 border rounded peer-checked:bg-green-400 peer-checked:text-white bg-gray-50">Business</label>
            </div>
        </div>
    </div>


    <div class="space-y-2">
        <label for="" class="block font-medium">Verify ID Card:</label>
        <div class="grid grid-cols-2 gap-6">
            <div>
                <input value="{{old('id_name',$user->vendor->id_detail->ID_Name??'')}}" class="w-full rounded bg-gray-50 " type="text" name="id_name" placeholder="Name in ID">
            </div>
            <div>
                <input value="{{old('id_number',$user->vendor->id_detail->ID_Number??'')}}" class="w-full rounded bg-gray-50 " type="text" name="id_number" placeholder="ID Number">
            </div>
            <!-- Image Input 1 -->
            <div class="border rounded bg-gray-50">
                <label for="id_card_front"
                    class="grid cursor-pointer place-items-center">
                    <div class="flex items-center gap-2 py-4" id="id-front-label">
                        <svg width="44px" height="44px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.2639 15.9375L12.5958 14.2834C11.7909 13.4851 11.3884 13.086 10.9266 12.9401C10.5204 12.8118 10.0838 12.8165 9.68048 12.9536C9.22188 13.1095 8.82814 13.5172 8.04068 14.3326L4.04409 18.2801M14.2639 15.9375L14.6053 15.599C15.4112 14.7998 15.8141 14.4002 16.2765 14.2543C16.6831 14.126 17.12 14.1311 17.5236 14.2687C17.9824 14.4251 18.3761 14.8339 19.1634 15.6514L20 16.4934M14.2639 15.9375L18.275 19.9565M18.275 19.9565C17.9176 20 17.4543 20 16.8 20H7.2C6.07989 20 5.51984 20 5.09202 19.782C4.71569 19.5903 4.40973 19.2843 4.21799 18.908C4.12796 18.7313 4.07512 18.5321 4.04409 18.2801M18.275 19.9565C18.5293 19.9256 18.7301 19.8727 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V16.4934M4.04409 18.2801C4 17.9221 4 17.4575 4 16.8V7.2C4 6.0799 4 5.51984 4.21799 5.09202C4.40973 4.71569 4.71569 4.40973 5.09202 4.21799C5.51984 4 6.07989 4 7.2 4H16.8C17.9201 4 18.4802 4 18.908 4.21799C19.2843 4.40973 19.5903 4.71569 19.782 5.09202C20 5.51984 20 6.0799 20 7.2V16.4934M17 8.99989C17 10.1045 16.1046 10.9999 15 10.9999C13.8954 10.9999 13 10.1045 13 8.99989C13 7.89532 13.8954 6.99989 15 6.99989C16.1046 6.99989 17 7.89532 17 8.99989Z"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span>ID Card Front</span>
                    </div>
                    <input id="id_card_front" type="file" name="id_card_front" accept="image/*"
                        class="hidden file-input"
                        onchange="previewImage(event, 'preview-front', 'container-front', 'delete-front','id-front-label')">
                    <div id="container-front" class="relative flex-col items-center hidden">
                        <img id="preview-front" src="#" alt="Image Preview Front"
                            class="w-full rounded shadow-lg">
                        <button id="delete-front" type="button"
                            class="absolute top-0 right-0 flex items-center justify-center p-2 text-white bg-red-500 rounded hover:bg-red-600"
                            onclick="deleteImage('id_card_front', 'preview-front', 'container-front', 'delete-front','id-front-label')">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                </label>
            </div>

            <!-- Image Input 2 -->
            <div class="border rounded bg-gray-50">
                <label for="id_card_back"
                    class="grid cursor-pointer place-items-center">
                    <div class="flex items-center gap-2 py-4" id="id-back-label">
                        <svg width="44px" height="44px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.2639 15.9375L12.5958 14.2834C11.7909 13.4851 11.3884 13.086 10.9266 12.9401C10.5204 12.8118 10.0838 12.8165 9.68048 12.9536C9.22188 13.1095 8.82814 13.5172 8.04068 14.3326L4.04409 18.2801M14.2639 15.9375L14.6053 15.599C15.4112 14.7998 15.8141 14.4002 16.2765 14.2543C16.6831 14.126 17.12 14.1311 17.5236 14.2687C17.9824 14.4251 18.3761 14.8339 19.1634 15.6514L20 16.4934M14.2639 15.9375L18.275 19.9565M18.275 19.9565C17.9176 20 17.4543 20 16.8 20H7.2C6.07989 20 5.51984 20 5.09202 19.782C4.71569 19.5903 4.40973 19.2843 4.21799 18.908C4.12796 18.7313 4.07512 18.5321 4.04409 18.2801M18.275 19.9565C18.5293 19.9256 18.7301 19.8727 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V16.4934M4.04409 18.2801C4 17.9221 4 17.4575 4 16.8V7.2C4 6.0799 4 5.51984 4.21799 5.09202C4.40973 4.71569 4.71569 4.40973 5.09202 4.21799C5.51984 4 6.07989 4 7.2 4H16.8C17.9201 4 18.4802 4 18.908 4.21799C19.2843 4.40973 19.5903 4.71569 19.782 5.09202C20 5.51984 20 6.0799 20 7.2V16.4934M17 8.99989C17 10.1045 16.1046 10.9999 15 10.9999C13.8954 10.9999 13 10.1045 13 8.99989C13 7.89532 13.8954 6.99989 15 6.99989C16.1046 6.99989 17 7.89532 17 8.99989Z"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span>ID Card Back</span>
                    </div>
                    <input id="id_card_back" type="file" name="id_card_back" accept="image/*"
                        class="hidden file-input"
                        onchange="previewImage(event, 'preview-back', 'container-back', 'delete-back','id-back-label')">
                    <div id="container-back" class="relative flex-col items-center hidden">
                        <img id="preview-back" src="#" alt="Image Preview Back"
                            class="w-full rounded shadow-lg">
                        <button id="delete-back" type="button"
                            class="absolute top-0 right-0 flex items-center justify-center p-2 text-white bg-red-500 rounded hover:bg-red-600"
                            onclick="deleteImage('id_card_back', 'preview-back', 'container-back', 'delete-back','id-back-label')">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                </label>
            </div>

        </div>
    </div>
</div>
<script>
    function previewImage(event, previewId, containerId, deleteId, labelItem) {
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var preview = document.getElementById(previewId);
            var container = document.getElementById(containerId);
            var hideLabel = document.getElementById(labelItem);
            preview.src = e.target.result;
            container.classList.remove('hidden');
            hideLabel.classList.add('hidden');
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function deleteImage(fileInputId, previewId, containerId, deleteId,labelItem) {
        var fileInput = document.getElementById(fileInputId);
        var preview = document.getElementById(previewId);
        var container = document.getElementById(containerId);
        var hideLabel = document.getElementById(labelItem);


        fileInput.value = '';
        preview.src = '#';
        container.classList.add('hidden');
        hideLabel.classList.remove('hidden');

    }
</script>
