<aside class="py-6 -mt-2 space-y-6">
    <h3 class="px-6 text-2xl font-bold">Shopping Cart</h3>
    <table class="min-w-full text-center dark:text-white ">
        <thead>
            <tr class=" border-y">
                <th scope="col" class="py-3">Item No.</th>
                <th scope="col" class="py-3">Product</th>
                <th scope="col" class="py-3">Price</th>
                <th scope="col" class="py-3">Dicount Rate</th>
                <th scope="col" class="py-3">Quantity</th>
                <th scope="col" class="py-3">Total Price</th>
                <th scope="col" class="py-3"></th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($mycart->cartItems))
                @foreach ($user->cart->cartItems as $item)
                    <tr class="border-b ">
                        <td class="px-6 py-2 whitespace-nowrap">
                            {{ $loop->count }}
                        </td>
                        <td class="flex items-center justify-center gap-3 px-6 py-3">
                            <img src="{{ asset('asset/images/product/' . $item->product->mainImage->image) }}"
                                class="object-contain h-16 aspect-square" alt="">
                            <p class="">{{ $item->product->name }}</p>
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap">NPR
                            {{ number_format($item->product->price, 2) }}
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap">
                            {{ number_format($item->product->discount_value, 2) }} %
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap">{{$item->quantity}}</td>
                        <td class="px-6 py-2 whitespace-nowrap">NPR {{number_format($item->product->discount_price(),2)}}</td>
                        <td class="px-6 py-2 whitespace-nowrap">
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex items-center p-1 text-white bg-red-600 rounded">
                                    <i class='bx bx-x'></i>
                                </button>

                            </form>
                        </td>
                    </tr>
                @endforeach
                @if ($mycart->cartItems->isEmpty())
                    <tr>
                        <td colspan="5" class="py-6 text-center border-b">No Any Items in Cart</td>
                    </tr>
                @endif
            @else
                <tr>
                    <td colspan="5" class="py-6 text-center border-b">No Any Items in Cart</td>
                </tr>
            @endif
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
