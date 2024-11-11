@extends('vendor.includes.main')
@section('styles')
    <link href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('asset/css/custom-datatables.css')}}">
@endsection
@section('content')
    <div class=" dark:text-white">
        <div class="items-center justify-between px-2 pt-3 lg:py-3 lg:px-0 lg:flex dark:border-gray-800">
            <div>
                <h4 class='text-xl font-semibold '>Payment List</h4>
                <p class="py-1 text-sm text-gray-400">Showing payments received recently.</p>
            </div>
            <div class="flex items-center justify-between gap-2 mt-2 lg:my-0" id="buttons"></div>
        </div>
        <div>
            <table class="text-left bg-white border dark:border-gray-800 dark:bg-gray-700" id="data-table">
                <thead class=" bg-gray-50/75 dark:bg-gray-900">
                    <tr class="border-b">                  
                        <th>Payment No.</th>
                        <th>Order No.</th>
                        <th>Payment Method</th>
                        <th>Payment Status</th>
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
                    url: "{{ route('vendor.payment.index') }}"
                },
                columns: [
                    {
                        "data": "id"
                    },
                    {
                        "data": "order_id"
                    },
                  
                    {
                        "data": "payment_method"
                    },
                  
                    {
                        "data": "status"
                    }
                   
                ],
             
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
                searching: false,
                responsive: true,
                bDestroy: true,
                lengthChange:false
            });
            $(".dt-layout-row:first-child .dt-layout-cell.dt-layout-end").append($("#table-options"));
            $("#buttons").prepend($(".buttons-csv"));
            $('#filterButton').click(function() {
                table.draw();
            });
            $('#filterReset').click(function() {
                document.getElementById("filterForm").reset();
            });
            $('#table-options').prepend($("#bulkDelete"));

           

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
                    text: 'You will not recover this category details!',
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
                                        'Category has been deleted.',
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
                            url: "{{ route('vendor.product.bulk-delete') }}",
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
