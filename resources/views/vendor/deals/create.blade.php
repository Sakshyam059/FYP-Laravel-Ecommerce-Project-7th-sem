@extends('vendor.includes.main')
@section('content')
    <div class="">
        <div class="flex items-center justify-between px-3 py-3">
            <h4 class="text-xl font-medium">
                Add Product to a Deal
            </h4>

        </div>
        <form method="post" action="{{ route('vendor.product-deal.store', $product->id) }}" class="px-3 space-y-4">
            @csrf
            <div class="space-y-2">
                <label for="" class="block">Deals Suggestions:</label>
                <select name="deal_id" id="" class="w-full rounded ng-gray-50">
                    <option selected disabled>Choose a Deal</option>
                    @foreach (App\Models\Deal::get() as $deal)
                        <option value="{{$deal->id}}">{{ $deal->deal_name }}</option>
                    @endforeach
                </select>

            </div>
          


            <div class="">
                <a href="{{ route('vendor.product.index') }}"
                    class="px-12 py-2 text-center border rounded bg-gray-50/40">Discard</a>
                <button type="submit" class="px-12 py-2 text-center text-white border rounded bg-blue-600/90">Add
                    Deal</button>
            </div>


        </form>
    </div>
@endsection
