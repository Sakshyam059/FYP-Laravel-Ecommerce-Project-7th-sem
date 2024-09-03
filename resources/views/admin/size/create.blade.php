<div x-data="{ modelOpen: false }" id="sizeModal">
    <button @click="modelOpen =!modelOpen" class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
        <span>Add Size</span>
    </button>

    <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modelOpen = false" x-show="modelOpen" 
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0" 
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100" 
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
            ></div>

            <div x-cloak x-show="modelOpen" 
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
            >
                <div class="relative flex items-center justify-between space-x-4">
                    <h1 class="text-xl font-medium text-gray-800 ">Add New Category</h1>

                    <button @click="modelOpen = false" class="inline-flex items-center p-1 text-2xl text-white bg-red-600 rounded-sm focus:outline-none hover:bg-red-400">
                        <i class='bx bx-x '></i>
                    </button>
                </div>

               

                <form method="post" class="mt-5" id="sizeForm">
                    @csrf
                    <div class="mb-2 space-y-2">
                        <div>
                            <label for="">Size Name</label>
                            <input type="text" name="size_name" value="{{ old('size_name') }}"
                                placeholder="Enter size name" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                <span class="hidden text-xs text-red-600" id="size_name_error"></span>
                        </div>

                    </div>
                    
                    
                    <div class="flex justify-end gap-2 mt-6">
                        <button id="clearBtn" type="button" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                            Reset
                        </button>
                        <button type="submit" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                            Add Size
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sizeForm').on('submit', function(e) {
                e.preventDefault();
                // $('.error-message').text('');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.product.size.store') }}",
                    data: $('#sizeForm').serialize(),
                    success: function(response) {
                        console.log(response)
                        if (response.success) {
                            $('#sizeForm')[0].reset();

                            Swal.fire({
                                icon: "success",
                                title: "Successfull",
                                text: response.message,
                                showConfirmButton: true,
                                timer: 1500
                            });

                            $('#data-table').DataTable().ajax.reload();
                            $('#sizeModal').attr('x-data', '{modelOpen:false}')

                        }
                    },
                    error: function(error) {
                        $.each(error.responseJSON.errors, function(key, value) {
                            console.log(value)
                            $('#' + key + '_error').show();
                            $('#' + key + '_error').text(value);
                        });
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#clearBtn').on('click', function(e) {
                $('#sizeForm')[0].reset();
                $('.error-message').text('');
            });
        });
    </script>
@endpush