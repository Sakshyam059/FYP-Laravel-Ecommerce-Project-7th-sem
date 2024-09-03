<aside class="">
    <h3 class="px-6 mb-4 text-2xl font-bold">Shopping Cart</h3>

    <table class="min-w-full text-sm font-normal dark:text-white ">
        <thead>
            <tr class="text-base border-y">
                <th scope="col" class="px-6 py-2">Product</th>
                <th scope="col" class="px-6 py-2">Price</th>
                <th scope="col" class="px-6 py-2">Quantity</th>
                <th scope="col" class="px-6 py-2">Total Price</th>
                <th scope="col" class="px-6 py-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->cart->cartItems as $item)
                <tr class="border-b ">
                    <td class="flex items-center gap-3 px-6 py-2">
                        <img src="{{ asset('admin/images/product/' . $item->product->mainImage->image) }}"
                            class="object-contain h-16 aspect-square" alt="">
                        <p class="">{{ $item->product->name }}</p>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap">NPR
                        {{ number_format($item->product->price - $item->product->price / $item->product->discount_value, 2) }}
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap">1</td>
                    <td class="px-6 py-2 whitespace-nowrap">1000</td>
                    <td class="px-6 py-2 whitespace-nowrap">
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-trash btn-danger">
                                <i class='bx bx-x'></i>
                            </button>
                            
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</aside>
<script>
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
</script>
