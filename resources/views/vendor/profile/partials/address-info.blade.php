<div class="space-y-4 ">
    <h2 class='text-xl font-semibold '>Address Information</h2>
    <div class="grid grid-cols-2 gap-6">
        <select name="state" id="province" class="w-full rounded bg-gray-50">
            <option selected disabled>Select State</option>
            @foreach (\App\Models\Province::get() as $province)
            <option  value="{{$province->id}}" {{$user->vendor->province_id==$province->id?'selected':''}}>{{$province->name}}</option>
            @endforeach
        </select>
        <select name="district" id="district" class="w-full rounded bg-gray-50">
            <option selected disabled>Select District</option>
            @foreach (\App\Models\District::get() as $district)
            <option  value="{{$district->id}}" {{$user->vendor->district_id==$district->id?'selected':''}}>{{$district->name}}</option>
                
            @endforeach
         </select>
    </div>
    <div>
        <input type="text" name="address" value="{{ old('address',$user->vendor->address??'')}}" class="w-full rounded bg-gray-50" placeholder="Address Line">
    </div>

</div>