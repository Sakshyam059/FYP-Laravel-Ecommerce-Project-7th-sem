@extends('frontend.includes.main')
@section('content')
   <section class="w-1/3 px-6 py-4 mx-auto border">
    <form action="{{route('otp.verify.submit')}}" method="POST">
        @csrf
        <div class="space-y-2">
            <label class="block font-semibold" for="form3Example8">Enter OTP</label>
            <input type="text"  class="block w-full rounded-md bg-gray-50 "
                name="otp" />
        </div>
        <div class="my-2">
            <button type="submit" class="w-full py-2 text-white bg-green-400 rounded">Submit</button>
        </div>
    </form>    
    <form action="{{route('otp.reset')}}" method="POST">
        @csrf
        <button type="submit" class="w-full py-2 text-white bg-blue-400 rounded">Resend</button>
    </form>
</section>
@endsection