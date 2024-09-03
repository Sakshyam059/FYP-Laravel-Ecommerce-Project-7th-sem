@extends('frontend.includes.main')
@section('content')
    <section class="px-6">
        <div class="flex items-center justify-between">
            <h4 class="w-full text-3xl font-medium">Checkout</h4>
            <ul class="flex items-center justify-between w-full px-3 pb-3 overflow-hidden ">
                <li class="w-full">
                    <div class="relative flex items-center px-6">
                        <div class="relative flex flex-col items-center py-10">
                            <div class="z-10 flex items-center p-1 bg-green-600 border-0 rounded-full w-fit">
                                <i class='text-white bx bxs-circle'></i>
                            </div>
                            <h4 class="absolute bottom-0 text-lg font-medium text-gray-800">Billings</h4>
                        </div>
                        <div class="absolute w-full h-1 bg-green-400 billing"></div>
                    </div>
                </li>
                <li class="w-full ">
                    <div class="relative flex items-center px-6">
                        <div class="relative flex flex-col items-center py-10">
                            <div class="z-10 flex items-center p-1 bg-green-600 border-0 rounded-full w-fit">
                                <i class='text-white bx bxs-circle'></i>
                            </div>
                            <h4 class="absolute bottom-0 text-lg font-medium text-gray-800">Payment</h4>
                        </div>
                        <div class="absolute w-full h-1 bg-green-400 billing"></div>
                    </div>
                </li>
                <li class="">
                    <div class="relative flex items-center px-6">
                        <div class="relative flex flex-col items-center py-10">
                            <div class="z-10 flex items-center p-1 bg-green-600 border-0 rounded-full w-fit">
                                <i class='text-white bx bxs-circle'></i>
                            </div>
                            <h4 class="absolute bottom-0 text-lg font-medium text-gray-800">Complete</h4>
                        </div>
                    </div>
                </li>



            </ul>
        </div>
        
        <div class="flex gap-3 my-4 justify-content-center">
    
            <div class="p-0 card col">
                <div class="bg-white border-0 card-header">
                    <h5 class="py-2 card-title">Billing Address</h5>
                </div>
                <div class="pt-0 card-body">
                    <div class="row">
                        <div class="mb-3 col form-group">
                            <label for="" class="form-label">First Name</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->firstname }}" readonly>
                        </div>
                        <div class="mb-3 col form-group">
                            <label for="" class="form-label">Last Name</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->lastname }}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col form-group">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->email }}" readonly>
                        </div>
                        <div class="mb-3 col form-group">
                            <label for="" class="form-label">Phone</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->phone }}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col form-group">
                            <label for="" class="form-label">Address</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3 col form-group">
                            <label for="" class="form-label">City</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col form-group">
                            <label for="" class="form-label">Zip Code</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col form-group">
                            <label for="" class="form-label">State</label>
                            <select name="city" id="" class="form-select">
                                <option value="">Choose your city</option>
                                <option value="">Kathmandu</option>
                                <option value="">Bharatpur</option>
                                <option value="">Pokhara</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Additional Notes</label>
                        <textarea class="form-control" name="" id="" cols="30" rows="3"></textarea>
                    </div>
                </div>
            </div>        
            <div class="">
                @include('frontend.cart.partials.shipping-info')
                <div class="mt-4 border-0 card">
                    <a href="{{route('checkout.payment')}}" class="btn btn-primary">Continue</a>
                    <a href="{{route('cart.index')}}" class="mt-2 btn btn-outline-secondary">Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection
