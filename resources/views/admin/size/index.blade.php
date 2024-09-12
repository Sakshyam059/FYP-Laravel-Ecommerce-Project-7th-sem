@extends('admin.includes.main')
@section('styles')
    <link href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('asset/css/custom-datatables.css')}}">
@endsection
@section('content')
    <div class=" dark:text-white">
        <div class="items-center justify-between px-2 pt-3 lg:py-3 lg:px-0 lg:flex dark:border-gray-800">
            <div>
                <h4 class='text-xl font-semibold '>Size List</h4>
                <p class="py-1 text-sm text-gray-400">Showing sizes added recently.</p>
            </div>
            <div class="flex items-center justify-between gap-2 mt-2 lg:my-0" id="buttons">
                @include('admin.size.create')

            </div>

        </div>
        <div>
            <button id="bulkDelete"
                class="hidden px-4 py-2 text-sm text-white bg-red-600 rounded cursor-pointer hover:bg-sky-100">
                <span class="inline-flex items-center gap-2 text-sm"><i class='bx bx-trash'></i> <span>Delete
                        all</span></span>
            </button>
            <div class="flex items-center gap-3" id="table-options">
                <div x-data="{ open: false }" class="relative text-sm">
                    <button @click="open = ! open"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-white border rounded focus:outline-none">
                        <i class='bx bx-filter-alt'></i><span> Filter By</span>
                    </button>
                    <div x-cloak x-show="open" @click.away="open = false"
                        class="absolute right-0 z-10 w-64 bg-white border border-gray-200 shadow ">
                        <div class="p-3">
                            <label for="">Status</label>
                            <select id="status" class="w-full py-1 mt-2 text-sm bg-transparent rounded">
                                <option selected disabled>Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-between gap-3 p-3 border-t">
                            <button class="w-full py-2 bg-gray-100 rounded-md" id="filterReset">Reset</button>
                            <button class="w-full py-2 text-white bg-blue-600 rounded-md" id="filterButton">Apply
                                Now</button>
                        </div>

                    </div>
                </div>

            </div>
            <table class="text-left capitalize bg-white border dark:border-gray-800 dark:bg-gray-700" id="data-table">
                <thead class=" bg-gray-50/75 dark:bg-gray-900">
                    <tr class="border-b">
                        <th><input class="mx-3 rounded lg:mx-1" name="select_all" value="1" id="select_all" type="checkbox" />
                        </th>
                        <th>Size Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
   @include('backend.includes.datatables-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $("#data-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.product.size.index') }}",
                    data: function(d) {
                        d.status = $('#status').val(),
                            d.search = $('.dt-search input').val()
                    }
                },
                columns: [{
                        "data": 'select_sizes'
         
                    },
                    {
                        "data": "size_name",
                        width:"33%"
                    },
                   
                    {
                        "data": "status",
                        sortable:false
                    },
                    {
                        "data": "action"
                       
                    },
                ],
                columnDefs: [{
                    "width": "150px",
                    "targets": [0, 1]
                }],
                order: [],
                layout: {
                    topStart: {
                        search: {
                            text: '',
                            placeholder: 'Search here',
                        }
                    },
                    topEnd: {
                        buttons: [{
                            extend: 'csv',
                            text: '<span class="inline-flex items-center gap-2 text-sm"><i class="text-lg bx bx-download"></i>Export CSV</span>',
                        }],
                    },
                    bottomEnd: {
                        paging: {
                            firstLast: false
                        }
                    }
                },
                paging: true,
                ordering: false,
                info: false,
                searching: true,
                responsive: true,
                bDestroy: true,
            });
            $(".dt-layout-row:first-child .dt-layout-cell.dt-layout-end").append($("#table-options"));
            $("#buttons").prepend($(".buttons-csv"));
            $('.dt-search input').attr({
                'type': 'text'
            });
            $('.dt-search').append(
                '<svg class="absolute w-5 h-5 left-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>'
            );
            $('#filterButton').click(function() {
                table.draw();
            });
            $('#filterReset').click(function() {
                document.getElementById("filterForm").reset();
            });
            $('#table-options').prepend($("#bulkDelete"));

            $('#select_all').on('change', function() {
                // Get all rows with search applied
                var rows = table.rows({
                    'search': 'applied'
                }).nodes();
                // Check/uncheck checkboxes for all rows in the table
                $('input[type="checkbox"]', rows).prop('checked', this.checked);
                let count = $('.select-all:checked').length;

                if (count > 0) {
                    $('#bulkDelete').show();
                } else {
                    $('#bulkDelete').hide();
                }
            });

            // Handle click on checkbox to set state of "Select all" control
            $('#data-table tbody').on('change', 'input[type="checkbox"]', function() {
                // If checkbox is not checked
                if (!this.checked) {
                    var el = $('#select_all').get(0);
                    // If "Select all" control is checked and has 'indeterminate' property
                    if (el && el.checked && ('indeterminate' in el)) {
                        // Set visual state of "Select all" control
                        // as 'indeterminate'
                        el.indeterminate = true;
                    }

                }
            });
            $('#data-table tbody').on('change', 'input[type="checkbox"]', function() {
                let count = $('input[type="checkbox"]:checked').length;
                if (count > 0) {
                    $('#bulkDelete').show();
                } else {
                    $('#bulkDelete').hide();
                }
            
            });

            $(document).on('click', '.deleteBtn', function() {
                var id = $(this).data('id');
                var deleteRoute = $(this).data('route');
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not recover this size details!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: deleteRoute,
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.status === 200) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Size has been deleted.',
                                        'success'
                                    ).then((result) => {
                                        if (result.isConfirmed || result
                                            .isDismissed) {
                                            $('#data-table').DataTable()
                                                .ajax
                                                .reload();
                                        }
                                    });
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        'Failed to delete.',
                                        'error'
                                    );
                                }
                            },
                            error: function(xhr, status, error) {
                                Swal.fire(
                                    'Error!',
                                    'Failed to delete product.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
            $(document).on('click', '#bulkDelete', function() {
                var id = [];
                if (confirm("Are you sure you want to Delete this data?")) {
                    $('input:checked').each(function() {
                        id.push($(this).val());
                    });
                    if (id.length > 0) {
                        
                        $.ajax({
                            url: "{{ route('admin.product.bulk-delete') }}",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            method: "get",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                alert(data);
                                $('#bulkDelete').hide();
                                $('#select_all').prop('checked', false);
                                $('#data-table').DataTable().ajax.reload();
                            },
                            error: function(data) {
                                var errors = data.responseJSON;
                                
                            }
                        });
                    } else {
                        alert("Please select atleast one checkbox");
                    }
                }
            });

        });
    </script>
@endsection
