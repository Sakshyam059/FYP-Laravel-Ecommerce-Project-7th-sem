<div class="space-y-4 ">
    <h2 class='text-xl font-semibold '>Address Information</h2>
    <div class="grid grid-cols-2 gap-6">
        <select name="state" id="" class="w-full rounded bg-gray-50">
            <option selected disabled>Select State</option>
            <option value="gandaki">Gandaki</option>
            <option value="bagmati">Bagmati</option>
            <option value="lumbini">Lumbini</option>
        </select>
        <select name="district" id="" class="w-full rounded bg-gray-50">
            <option selected disabled>Select District</option>
            <option value="gandaki">Gandaki</option>
            <option value="bagmati">Bagmati</option>
            <option value="lumbini">Lumbini</option>
        </select>
    </div>
    <div>
        <input type="text" name="address" value="{{ old('address',$user->vendor->address)}}" class="w-full rounded bg-gray-50" placeholder="Address Line">
    </div>

</div>
