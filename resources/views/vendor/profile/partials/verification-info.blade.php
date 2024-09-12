<div class="space-y-4 ">
    <h2 class='text-xl font-semibold '>ID Verification</h2>
    <div class="flex gap-6 item-center">
        <label>Account Type</label>
        <div class="flex items-center gap-2">
            <input type="radio" value="individual" name="account_type" id="individual"><label for="individual">Individual</label>
        </div>
        <div class="flex items-center gap-2">

            <input type="radio" value="business" name="account_type" id="business"><label for="business">Business</label>
        </div>
    </div>
    <div class="space-y-2">
        <label for="" class="block">Verify ID Card</label>
        <div class="grid grid-cols-2 gap-6">
            <div class="p-6 space-y-2 border rounded bg-gray-50">
                <label for="" class="block">ID Card Front</label>
                <input name="id_card_front" type="file">
            </div>
            <div class="p-6 space-y-2 border rounded bg-gray-50">
                <label for="" class="block">ID Card Back</label>
                <input name="id_card_back" type="file">
            </div>
            <div>
                <input value="{{old('id_name')}}" class="w-full rounded bg-gray-50 " type="text" name="id_name" placeholder="Your Name">
            </div>
            <div>
                <input value="{{old('id_number')}}" class="w-full rounded bg-gray-50 " type="text" name="id_number" placeholder="ID Number">
            </div>
        </div>
    </div>
   
</div>
